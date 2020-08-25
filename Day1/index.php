<?php

abstract class hewan
{
    // TODO: Adapun property yang ada di kelas Hewan adalah nama, darah dengan nilai default 50, jumlahKaki, dan keahlian.
    public $name;
    public $health;
    public $legnum;
    public $ability;

    public function atraksi()
    {
        return "$this->name memiliki $this->legnum kaki<br>$this->name sedang $this->ability";
    }
}
abstract class fight extends hewan
{
    // TODO: Sedangkan property yang ada di kelas Fight adalah attackPower, defencePower.
    public $attackpower;
    public $defencepower;

    public function __construct($attackpower, $defencepower, $name, $health, $legnum, $ability)
    {
        $this->name = $name;
        $this->health = $health;
        $this->legnum = $legnum;
        $this->ability = $ability;
        $this->attackpower = $attackpower;
        $this->defencepower = $defencepower;
    }

    public function serang($enemy)
    {
        return "$this->name sedang menyerang $enemy";
    }

    public function diserang($enemy, $enemyatt)
    {
        $this->health -= (intval($enemyatt) / $this->defencepower);
        return "$this->name sedang diserang $enemy<br>Darah $this->name saat ini adalah $this->health";
    }
}

class elang extends fight
{
    public function getInfoHewan($enemy, $enemyatt)
    {
        return parent::atraksi() . "<br>" . $this->serang($enemy) . "<br>" . $this->diserang($enemy, $enemyatt) . "<br>";
    }
}

class harimau extends fight
{
    public function getInfoHewan($enemy, $enemyatt)
    {
        return parent::atraksi() . "<br>" . $this->serang($enemy) . "<br>" . $this->diserang($enemy, $enemyatt) . "<br>";
    }
}


// TODO: Ketika Elang diinstansiasi, maka jumlahKaki bernilai 2, dan keahlian bernilai “terbang tinggi”, attackPower = 10 , deffencePower = 5 ;
$elang = new elang(10, 5, "Elang1", 50, 2, "terbang tinggi");

// TODO: Ketika Harimau diintansiasi, maka jumlahKaki bernilai 4, dan keahlian bernilai “lari cepat” , attackPower = 7 , deffencePower = 8 ;
$harimau = new harimau(7, 8, "Harimau1", 50, 4, "lari cepat");

for ($i = 0; $i < 10; $i++) {
    echo $elang->getInfoHewan($harimau->name, $harimau->attackpower);
    echo "<br><br>";
    echo $harimau->getInfoHewan($elang->name, $elang->attackpower);
    echo "<br><hr><br>";
}
