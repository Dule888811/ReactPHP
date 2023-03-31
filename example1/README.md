# Task 1

Detect phone numbers country code and country name. You should read `db.txt` file with information about countries and then read `input.txt` with numbers that need detection. Result is written into `output.txt` file.

## Notes

 - all file reading and writing should be done via `react/filesystem`
 - create a full OOP solution
 - main script should accept arguments for input and output file (`-i` and `-o`)

## `db.txt` file

This file contains information about country code and country name. File is in format:

```
country_code<SPACE>country_name<NL>
```

## `input.txt`

This file contains numbers for which country code detection is required. One number per line. Format:

```
number<LF>
```

## `output.txt`

You need to write detected country code and country name to this file. Format:

```
number<SPACE>country_code<SPACE>counry_name<NL>
```

## Requirements

- PHP 7.4
- react/filesystem (https://github.com/reactphp/filesystem)

## Install

`composer require react/filesystem:^0.2@dev`

## Example

`./script.php -d db.txt -i input.txt -o output.txt`

### `db.txt`

```
386 Slovenia
385 Croatia
```

### `input.txt`

```
38641501471
38541501471
```

### `output.txt`

```
38641501471 386 Slovenia
38541501471 385 Croatia
```

## Extra points

Write additinal numbers in `input.txt` that would yield error and handle that in output.txt with:

```
number error
```

### Example additional numbers

Put this numbers in `input.txt` file:

```
9819849184
0971240174
34394830498
```
