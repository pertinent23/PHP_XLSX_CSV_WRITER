<?php 

class HeadersWriter{
    static function writeHeader( string $key = '', string $value = '' ) {
        header( "$key: $value" );
    }
    
    static function filename( string $name = '', string $extension = '' ) {
        self::writeHeader( 'Content-Disposition', "attachment; filename=\"$name.$extension\"" );
    }
    
    static function CSVHeaders( string $filename = '' ) {
        self::writeHeader( 'Content-Type', 'text/csv' );
        self::filename( $filename, 'csv' );
        self::writeHeader( 'Pragma', 'public' );
    }
    
    static function XLXSHeaders( string $filename = '' ) {
        self::filename( $filename, 'xlsx' );
        self::writeHeader( 'Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
        self::writeHeader( 'Content-Transfer-Encoding', 'binary' );
        self::writeHeader( 'Cache-Control', 'must-revalidate' );
        self::writeHeader( 'Pragma', 'public' );
    }
}