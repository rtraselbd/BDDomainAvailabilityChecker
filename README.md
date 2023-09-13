# (DOT).BD Domain Availability Checker for WHMCS

The (DOT).BD Domain Availability Checker is a simple tool for WHMCS that allows you to check the availability of specific (DOT).BD domain extensions directly from your WHMCS installation.

## Installation

### Step 1: Download and Upload `domainchecker.php`

1. Download the `domainchecker.php` file from this repository.

2. Upload the `domainchecker.php` file to your WHMCS root directory.

3. (Optional) For security purposes, you can consider renaming the `domainchecker.php` file to something less predictable.

### Step 2: Update `dist.whois.json`

1. Locate the `dist.whois.json` file in your WHMCS installation. This file is typically located in the `/resources/domains/` directory.

2. Open the `dist.whois.json` file for editing.

3. Add the following code at the beginning of the JSON array, replacing `https://example.com/your_script.php` with the actual valid HTTPS URL where your domain availability checking script is hosted:

   ```json
   {
       "extensions": ".com.bd,.net.bd,.org.bd,.edu.bd,.co.bd,.mil.bd,.gov.bd,.ac.bd,.info.bd,.tv.bd,.sw.bd",
       "uri": "https://example.com/your_script.php?search=",
       "available": "Domain is available"
   }
   ```

   - **Important Note:** Ensure that you add a comma after each JSON object. JSON requires valid syntax, and missing commas can cause errors.

4. Save the `dist.whois.json` file after making the changes.

   **If you forget to add a comma after a JSON object or encounter JSON syntax errors**, you will receive an error message or validation alert when WHMCS attempts to load the `dist.whois.json` file. Be sure to review and fix any JSON syntax issues.

## Usage

Once you have installed the (DOT).BD Domain Availability Checker, you can use it within your WHMCS installation. Users will be able to check the availability of domain extensions listed in the `dist.whois.json` file by searching for a domain name.

## Contributing

We welcome contributions from the community. If you find any issues or have suggestions for improvements, please feel free to open an issue or create a pull request.

## License

This project is licensed under the [MIT License](LICENSE).