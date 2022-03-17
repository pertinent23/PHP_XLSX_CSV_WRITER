<?php
include_once( "./xlsx/xlsxwriter.class.php" );


class XLSX_Writer{
    protected array $headers = [];
    protected XLSXWriter $handle;
    const MAIN_SHEET_NAME = 'main';

    public function __construct( array $headers = [ ] ) {
        $this->headers = $headers;
        $this->handle = new XLSXWriter();
        if ( count( $headers ) ) {
            $this->handle->writeSheetHeader( XLSX_Writer::MAIN_SHEET_NAME, $headers );
        }
    }

    public function addHeaders( string $sheetname = '', array $headers = [ ] ) : XLSX_Writer {
            $this->handle->writeSheetHeader( $sheetname ? $sheetname : XLSX_Writer::MAIN_SHEET_NAME, $headers );
        return $this;
    }

    public function addLines( array $lines = [ ], string $sheetname = '' ) : XLSX_Writer {
            $this->handle->writeSheet( $lines, $sheetname ? $sheetname : XLSX_Writer::MAIN_SHEET_NAME );
        return $this;
    }

    public function addLine( array $line = [ ], string $sheetname = '' ) : XLSX_Writer {
            $this->handle->writeSheetRow( $sheetname ? $sheetname : XLSX_Writer::MAIN_SHEET_NAME, $line );
        return $this;
    }

    public function writeToStdOut() : XLSX_Writer {
            $this->handle->writeToStdOut();
        return $this;
    }

    public function writeToFile( string $filename = '' ) : XLSX_Writer {
            $this->handle->writeToFile( $filename );
        return $this;
    }
}