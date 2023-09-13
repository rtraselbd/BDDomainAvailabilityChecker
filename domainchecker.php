<?php

class DomainChecker
{
    public function checkAvailability($input)
    {
        $inputDomain = trim($input);

        if ($this->isValidDomain($inputDomain)) {
            $hostname = $this->removeHttpAndWww($inputDomain);
            $dns_records = dns_get_record($hostname, DNS_ALL);

            if ($dns_records) {
                return [
                    'status' => 'error',
                    'message' => 'Domain is registered in DNS.'
                ];
            } else {
                return [
                    'status' => 'success',
                    'message' => 'Domain is not registered in DNS (may be available for registration).'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Invalid domain format.'
            ];
        }
    }

    private function isValidDomain($domain)
    {
        return preg_match('/^(https?:\/\/)?(www\.)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $domain);
    }

    private function removeHttpAndWww($input)
    {
        $input = trim($input);
        $input = preg_replace('/^(https?:\/\/)?(www\.)?/i', '', $input);

        return $input;
    }
}


$domainChecker = new DomainChecker();

if (isset($_REQUEST['search'])) {
    $result = $domainChecker->checkAvailability($_REQUEST['search']);
    if (isset($result) && $result['status'] === 'success') {
        echo 'Domain is available';
    } else {
        echo 'Domain is not available';
    }
} else {
    echo 'Please provide a domain to check.';
}