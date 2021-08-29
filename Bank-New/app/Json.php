<?php

namespace Pinigu\Bankas;

use App\DB\DataBase;

class Json implements DataBase
{

    private static $obj;
    private $data;

    public static function get()
    {
        // return self::$obj ?? new self(self::$obj);
        return self::$obj ?? self::$obj = new self;
    }

    private function __construct()
    {
        if (!file_exists(DIR . 'data/saskaitos.json')) {
            file_put_contents(DIR . 'data/saskaitos.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR . 'data/saskaitos.json'), 1);
    }

    public function __destruct()
    {

        file_put_contents(DIR . 'data/saskaitos.json', json_encode($this->data));
    }



    function create(array $bankasData): void
    {
        if (isset($bankasData)) {
            $this->data[] = $bankasData;
        }
    }

    function update(int $bankasId, array $bankasData): void
    {
        foreach ($this->data as $key => $saskaita) {
            if (substr($saskaita['SaskNr'], 2) == $bankasId) {
                $this->data[$key]=$bankasData;
            }
        }
    }

    function delete(int $bankasId): void
    {
        foreach ($this->data as $key => $saskaita) {
            if (substr($saskaita['SaskNr'], 2) == $bankasId) {
                unset($this->data[$key]);
            }
        }
    }

    function show(int $bankasId): array
    {
        foreach ($this->data as $saskaita) {
            if (substr($saskaita['SaskNr'], 2) == $bankasId) {
                return $saskaita;
            }
        }
        return [];
    }

    function showAll(): array
    {
        return $this->data;
    }
}
