<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallIncrements('id');
            $table->smallInteger('subcat_id', false, true);
            $table->string('name', 64);
            $table->float('price');
            $table->tinyInteger('active', false, true);
            $table->enum('unit', ['шт','кг']);
        });
        Schema::create('article_cats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('name', 128);
            $table->string('description', 200);
        });
        Schema::create('article_subcats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallIncrements('id');
            $table->smallInteger('cat_id', false, true);
            $table->string('name', 64);
        });
        Schema::create('bills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->mediumIncrements('id');
            $table->smallInteger('client_id', false, true);
            $table->string('contract_num', 128);
            $table->double('sum', 10, 2);
            $table->double('remainder', 10, 2);
            $table->date('date');
            $table->string('contents', 128);
        });
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallIncrements('id');
            $table->string('name', 128);
            $table->string('address', 128)->nullable();
            $table->smallInteger('region_id', false, true)->nullable();
            $table->string('telephone', 10)->nullable();
            $table->string('fax', 10)->nullable();
            $table->string('contact_fio', 64)->nullable();
            $table->string('contact_post', 32)->nullable();
            $table->string('account', 20)->nullable();
            $table->string('bank', 64)->nullable();
            $table->bigInteger('INN')->nullable();
            $table->integer('BIK')->nullable();
            $table->bigInteger('KPP')->nullable();
            $table->dateTime('next_call_date')->nullable();
            $table->smallInteger('sort');
            $table->tinyInteger('active');
        });
        Schema::create('clients_articles_prises', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallInteger('client_id', false, true);
            $table->smallInteger('article_id', false, true);
            $table->double('price', 10, 2);
        });
        Schema::create('contracts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('contract_num', 128);
            $table->date('date');
            $table->smallInteger('client_id', false, true);
            $table->double('sum', 10, 2);
            $table->double('payed', 10, 2);
            $table->date('term_start');
            $table->date('term_end');
            $table->enum('type', ['contract','agreement']);
        });
        Schema::create('contracts_rows', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->mediumInteger('contract_id');
            $table->smallInteger('article_id');
            $table->double('quantity', 10, 2);
            $table->double('price', 10, 2);
        });
        Schema::create('invoices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->date('date');
            $table->string('number', 128);
            $table->smallInteger('client_id');
            $table->string('contract_num', 128);
            $table->double('sum', 10, 2);
            $table->double('payed', 10, 2);
        });
        Schema::create('invoices_bills', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->integer('invoice_id');
            $table->integer('bill_id');
        });
        Schema::create('invoices_rows', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->integer('invoice_id', false, true);
            $table->smallInteger('article_id', false, true);
            $table->double('quantity', 10, 2);
            $table->double('price', 10, 2);
        });
        Schema::create('purchases', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('number', 128);
            $table->date('date');
            $table->float('sum', 8, 2);
        });
        Schema::create('purchases_rows', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->integer('purchase_id', false, true);
            $table->smallInteger('article_subcategory_id', false, true);
            $table->double('quantity', 10, 2);
            $table->double('price', 10, 2);
        });
        Schema::create('regions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallIncrements('id');
            $table->string('name', 64);
            $table->string('description', 255);
        });
        Schema::create('settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->tinyIncrements('id');
            $table->string('name', 128);
            $table->string('key', 128);
            $table->string('value', 128);
        });
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('username', 255);
            $table->char('email', 128);
            $table->char('password_hash', 255);
            $table->tinyInteger('confirmed');
            $table->char('confirm_code', 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
