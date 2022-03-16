# PHP_XLSX_CSV_WRITER
a php script to writte xlsx and csv file

This library is designed to be lightweight, and have minimal memory usage.

It is designed to output an Excel compatible spreadsheet in (Office 2007+) xlsx format, with just basic features supported:

supports PHP 5.2.1+
takes UTF-8 encoded input
multiple worksheets
supports currency/date/numeric cell formatting, simple formulas
supports basic cell styling
supports writing huge 100K+ row spreadsheets

#Import CSV and XLSX writter

include_once( "./csv/csv.writer.php" );
include_once( "./xlsx/xlsx.writer.php" );
include_once( "./headers.writer.php" );

#For Excel Files

include_once( "./xlsx/xlsx.writer.php" );
include_once( "./headers.writer.php" );

HeadersWriter::XLXSHeaders( 'test' );

$writter = new XLSX_Writer();
$rows = array(
    array( 'id', 'content' ),
    array( '1', 'ananas' ),
    array( '2', 'water' ),
    array( '3', 'bread' ),
    array( '5', 'meat' ),
);

$writter->addLines( $rows );
$writter->writeToStdOut();

#Or to writte in a specific file

$writter->writeToFile( "filename" );
//without extension

#For CSV Files

include_once( "./xlsx/xlsx.writer.php" );
include_once( "./headers.writer.php" );

HeadersWriter::CSVSHeaders( 'test' );

$writter = new CSV_Writer();
$rows = array(
    array( 'id', 'content' ),
    array( '1', 'ananas' ),
    array( '2', 'water' ),
    array( '3', 'bread' ),
    array( '5', 'meat' ),
);

$writter->addLines( $rows );
$writter->writeToStdOut();

#Or to writte in a specific file

$writter->writeToFile( "filename", "mode" );
//without extension