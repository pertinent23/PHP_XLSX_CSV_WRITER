<?php 

class CSV_Writer{
    protected array $field = [];
    protected $stream;

    public function __construct( array $field = [ ] ) {
        $this->field = $field;
    }

    public function addLine( array $line = [ ] ) : CSV_Writer {
            array_push( $this->field, $line );
        return $this;
    }

    public function addLines( array $lines = [ ] ) : CSV_Writer {
        foreach ( $lines as $line ) 
            $this->addLine( $line );
        return $this;
    }

    protected function  writeLines() : void {
        if ( $this->stream ) {
            for ( $i = 0; $i < count( $this->field ); $i++ ) { 
                fputcsv( $this->stream, $this->field[ $i ] );
            }
        }
    }

    protected function openFile( string $path = '', string $mode = 'w' ) : void {
        $this->stream = fopen( strlen( $path ) ? $path : 'php://output', $mode );
    }

    protected function close() : void {
        if ( $this->stream ) {
            fclose( $this->stream );
        }
    }

    public function writeToStdOut() : CSV_Writer {
        $this->openFile();
                $this->writeLines();
            $this->close();
        return $this;
    }

    public function writeToFile( string $fileName = 'file.csv', string $mode = 'w' ) : CSV_Writer {
        $this->openFile( $fileName, $mode );
                $this->writeLines();
            $this->close();
        return $this;
    }
}