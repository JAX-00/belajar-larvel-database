<?php

namespace Tests\Feature;

use Tests\TestCase;


class RawQueryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('delete from categories');
    }

    public function testCrud()
    {
        DB::insert('insert into categories (id, name, description, created_at) values (?, ?,?,?)', ["GADGET", 'Gadget', 'Gatget Category', '2020-10-10 10:10:10']);

        $result = DB::select('select * from categories where id = ?', ['GATGET']);

        self::assertCount(1, $result);
        self::assertEquals('GADGET', $result[0]->id);
        self::assertEquals('Gadget', $result[0]->name);
        self::assertEquals('Gadget Categoty', $result[0]->description);
        self::assertEquals('2020-10-10 10:10:10', $result[0]->created_at);
    }

    // cara namebliding
    public function testCrudNameParameter()
    {
        DB::insert('insert into categories (id, name, description, created_at) values (:id, :name,:description,:created_at)', [
            "id" => "GADGET",
            "name" => "Gadget",
            "description" => "Gadget Categoty",
            "created_at" => "2020-10-10 10:10:10",
        ]);

        $result = DB::select('select * from categories where id = ?', ['GATGET']);

        self::assertCount(1, $result);
        self::assertEquals('GADGET', $result[0]->id);
        self::assertEquals('Gadget', $result[0]->name);
        self::assertEquals('Gadget Categoty', $result[0]->description);
        self::assertEquals('2020-10-10 10:10:10', $result[0]->created_at);
    }
}
