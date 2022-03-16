<?php 
include_once( "./csv/csv.writer.php" );
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