## In the root directory

- AddDefaultCharset utf-8 
- RewriteEngine On // rules for rewrite
- RewriteRule (.*) public/$1 // redirect all into /public

## In public

- RewriteCond %{REQUEST_FILENAME} !-f // conditional) if request not to specific file
- RewriteCond %{REQUEST_FILENAME} !-d // conditional) if request not to specific directory
- RewriteRule (.*) index.php?$1 [L,QSA] // then redirect to index.php
  - L // last (rule)
  - QSA // Query String Append. If additional parametrs will have sent in request than QSA will have sent it to $1 