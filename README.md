# PHP_XLSX_CSV_WRITER
a php script to writte xlsx and csv file

#Import CSV and XLSX writter

```php
include_once( "./csv/csv.writer.php" );
include_once( "./xlsx/xlsx.writer.php" );
include_once( "./headers.writer.php" );
```

PHP_XLSXWriter
==============

This library is designed to be lightweight, and have minimal memory usage.

It is designed to output an Excel compatible spreadsheet in (Office 2007+) xlsx format, with just basic features supported:
* supports PHP 5.2.1+
* takes UTF-8 encoded input
* multiple worksheets
* supports currency/date/numeric cell formatting, simple formulas
* supports basic cell styling
* supports writing huge 100K+ row spreadsheets

[Never run out of memory with PHPExcel again](https://github.com/pertinent23/PHP_XLSX_CSV_WRITER).

Simple PHP CLI example:
```php
$data = array(
    array('year','month','amount'),
    array('2003','1','220'),
    array('2003','2','153.5'),
);

$writer = new XLSXWriter();
$writer->writeSheet($data);
$writer->writeToFile('output.xlsx');
```

# For CSV Files

```php

include_once( "./xlsx/xlsx.writer.php" );
include_once( "./headers.writer.php" );

HeadersWriter::CSVSHeaders( 'test' );

$writter = new CSV_Writer();
$rows = array(
    array( 'id', 'content' ),
    array( '1', 'ananas' ),
    array( '2', 'water' ),
    array( '3', 'bread' ),
    array( '4', 'meat' ),
);

$writter->addLines( $rows );
$writter->writeToStdOut();
```


```php

#Or to writte in a specific file
$writter->writeToFile( "filename", "mode" );
#without extension

```

# For Excel Files

```php
include_once( "./xlsx/xlsx.writer.php" );
include_once( "./headers.writer.php" );

HeadersWriter::XLXSHeaders( 'test' );

$writter = new XLSX_Writer();
$rows = array(
    array( 'id', 'content' ),
    array( '1', 'ananas' ),
    array( '2', 'water' ),
    array( '3', 'bread' ),
    array( '4', 'meat' ),
);

$writter->addLines( $rows );
$writter->writeToStdOut();
```

# Or to writte in a specific file

```php
$writter->writeToFile( "filename" );
#without extension

```

```
| id | content  |
| -- | -------- |
| 1  |  ananas  |
| 2  |  water   |
| 3  |  bread   |
| 4  |  meat    |
```
# And for CSV File

```csv
"id","content"
"1",""ananas"
"2","water"
"3","bread"
"4","meat"
```