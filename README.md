# PHP Code sniffer <!-- omit in toc -->

- [Overview](#overview)
- [Installation](#installation)
- [Usage](#usage)
  - [PHPCS](#phpcs)
  - [PHPCBF](#phpcbf)
- [Code standards](#code-standards)
- [Configuration](#configuration)
  - [Ignoring File and Folders](#ignoring-file-and-folders)
    - [Ignoring with comments](#ignoring-with-comments)
- [Extensions](#extensions)
  - [Slevomat Coding Standards](#slevomat-coding-standards)
- [VSCode extension](#vscode-extension)
  - [ValeryanM.vscode-phpsab](#valeryanmvscode-phpsab)

## Overview

Contains 2 different executable:

- `phpcs`: Scan PHP, JavaScript and CSS files for violation.
- `phpcfb`: Automatically correct coding standard violations.

[Homepage](https://github.com/PHPCSStandards/PHP_CodeSniffer/)

- Supports PHP >= 5.4

## Installation

- Install [PHP_codeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

  ```bash
  composer require --dev squizlabs/php_codesniffer
  ```

## Usage

### PHPCS

- Scan files

  <!-- textlint-disable no-todo -->
  ```bash
  $phpcs app --standard=PSR12
  FILE: /home/user13/code/ci-phpcs-demo/app/Book.php
  ---------------------------------------------------------------------------------------------------
  FOUND 2 ERRORS AFFECTING 1 LINE
  ---------------------------------------------------------------------------------------------------
  6 | ERROR | [ ] Each class must be in a namespace of at least one level (a top-level vendor name)
  6 | ERROR | [x] Opening brace of a class must be on the line after the definition
  ---------------------------------------------------------------------------------------------------
  PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
  ---------------------------------------------------------------------------------------------------

  Time: 20ms; Memory: 6MB
  ```
  <!-- textlint-enable no-todo -->

- Use `-n` to ignore `warning` level violations.

  ```shell
  phpcs -n app
  ```

- Use `--report=summary` to output a summary of the issues.

  ```bash
  phpcs -s --report=summary
  ```

### PHPCBF

- To automatically fix errors:

    ```shell
    $ phpcbf
    F 1 / 1 (100%)

    PHPCBF RESULT SUMMARY
    ----------------------------------------------------------------------------
    FILE                                                        FIXED  REMAINING
    ----------------------------------------------------------------------------
    /home/user13/code/ci-phpcs-demo/app/Book.php     2      0
    ----------------------------------------------------------------------------
    A TOTAL OF 2 ERRORS WERE FIXED IN 1 FILE
    ```

`phpcbf` will make a "best effort". `phpcbf` will report any unfixed errors.

## Code standards

When not set, via configuration or CLI, PHPCS defaults to `PEAR` standard.

- Use `-i` to list available code standards.

    ```shell
    $ phpcs -i
    The installed coding standards are MySource, PEAR, PSR1, PSR2, PSR12, Squiz and Zend
    ```

- Use `-e` with a installed standard to list available checks.

    ```shell
    $ phpcs --standard=PSR12 -e
    ...
    PSR12 (17 sniffs)
    -----------------
    PSR12.Classes.AnonClassDeclaration
    PSR12.Classes.ClassInstantiation
    PSR12.Classes.ClosingBrace
    ...
  ```

### Specify An Encoding

By default, PHPCS assumes all files have UTF-8 encoding.

```shell
phpcs --encoding=shiftjis app
```

## Configuration

PHPCS attempts to find a valid configuration by looking for files in the following order:

`.phpcs.xml`, `phpcs.xml`, `.phpcs.xml.dist`, `phpcs.xml.dist`

The following CLI

```shell
phpcs --colors -p -s --standard=PSR12 src tests
```

... Can be replace with a configuration file:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">

    <!--  Define a cache file. Add this to .gitignore  -->
    <arg name="cache" value=".phpcs-cache"/>
    <!--  Turn colors ON. -->
    <arg name="colors"/>
    <!-- Show progress of the run. -->
    <arg value="p"/>
    <!-- Show sniff codes in all reports -->
    <arg value="s" />

    <!-- Use PSR12 standards -->
    <rule ref="PSR12"/>

    <file>src</file>
    <file>tests</file>
</ruleset>
```

### Ignoring File and Folders

- Ignore globs using the CLI

```shell
phpcs --ignore=*/tests/*,*/data/* /path/to/code
```

#### Ignoring with comments

- To ignore an entire file

```php
<?php
// phpcs:ignoreFile -- this is not a core file
$xmlPackage = new XMLPackage;
```

- To ignore a code block

```php
$xmlPackage = new XMLPackage;
// phpcs:disable
$xmlPackage['error_code'] = get_default_error_code_value();
$xmlPackage->send();
// phpcs:enable
```

- To ignore a specific rule only

```php
// phpcs:disable Generic.Commenting.Todo.Found
// TODO: Add an error message here.
$xmlPackage->send();
// phpcs:enable
```

## Extensions

### Slevomat Coding Standards

[Slevomat](https://github.com/slevomat/coding-standard) adds rules and styling.

> Slevomat Coding Standard for PHP_CodeSniffer provides sniffs that fall into three categories:
>
> - Functional - improving the safety and behavior of code
> - Cleaning - detecting dead code
> - Formatting - rules for consistent code looks

```shell
composer require --dev slevomat/coding-standard
```

## VSCode extension

### ValeryanM.vscode-phpsab

Homepage: <https://marketplace.visualstudio.com/items?itemName=ValeryanM.vscode-phpsab>

- Extension requires locally install PHPCS

```json
  "[php]": {
    "editor.formatOnSave": true,
    "editor.defaultFormatter": "valeryanm.vscode-phpsab"
  },
  "phpsab.fixerEnable": true,
  "phpsab.snifferEnable": true,
  "phpsab.autoRulesetSearch": true,
  "phpsab.snifferShowSources": true,
  "phpsab.snifferMode": "onSave"
```
