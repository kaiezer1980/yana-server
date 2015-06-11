<?php
class System{

	public static function getInfos(){
		$return = self::commandSilent('cat /proc/cpuinfo');
		$lines = preg_split("/\\r\\n|\\r|\\n/", $return);
		$infos = array();
		foreach($lines as $line){
			if(strpos($line,':') === false ) continue;
			list($key,$value)  = explode(':',$line);
			$infos[trim($key)] = trim($value);
		}
		return $infos;
	}
	
	public static function getPinForModel($model,$version){
		$model = $model.$version;
		
		
		//@TODO re-check pins mapping for revisions / types (it's fucking nightmare)
		
		$pins = array();
		
		// rev 1.0 type B
		$pins['b1.0'] = array(
							array(
								//name,function,wiringPiNumber,bcmNumber,physicalNumber
								new Gpio('3.3V','Alimentation',-1,-1,1),
								new Gpio('SDA0','I2C',8,0,3),
								new Gpio('SCL0','I2C',9,1,5),
								new Gpio('GPIO 7','',7,4,7),
								new Gpio('DNC','Masse (GND)',-1,-1,9),
								new Gpio('GPIO 0','',0,17,11),
								new Gpio('GPIO 2','',2,21,13),
								new Gpio('GPIO 3','',3,22,15),
								new Gpio('DNC','Masse (GND)',-1,-1,17),
								new Gpio('MOSI','SPI',12,10,19),
								new Gpio('MISO','SPI',13,9,21),
								new Gpio('SCLK','SPI',14,11,23),
								new Gpio('DNC','',-1,-1,25),
							),
							array(
								new Gpio('5V','Alimentation',-1,-1,2),
								new Gpio('DNC','Masse (GND)',-1,-1,4),
								new Gpio('0V','Masse (GND)',-1,-1,6),
								new Gpio('TxD','UART (Transmission)',14,14,8),
								new Gpio('RxD','UART (Réception)',15,15,10),
								new Gpio('GPIO 1','',1,18,12),
								new Gpio('DNC','Masse (GND)',-1,-1,14),
								new Gpio('GPIO 4','',4,23,16),
								new Gpio('GPIO 5','',5,24,18),
								new Gpio('DNC','Masse (GND)',-1,-1,20),
								new Gpio('GPIO 6','',6,25,22),
								new Gpio('CE 0','SPI',10,8,24),
								new Gpio('CE 1','SPI',11,7,26),
							)
						);
		$pins['a1.0'] = $pins['b1.0'];
		// rev 2.0 type B
		$pins['b2.0'] = array(
							array(
								//name,function,wiringPiNumber,bcmNumber,physicalNumber
								new Gpio('3.3V','Alimentation',-1,-1,1),
								new Gpio('SDA0','I2C',8,2,3),
								new Gpio('SCL0','I2C',9,3,5),
								new Gpio('GPIO 7','',7,4,7),
								new Gpio('DNC','Masse (GND)',-1,-1,9),
								new Gpio('GPIO 0','',0,17,11),
								new Gpio('GPIO 2','',2,27,13),
								new Gpio('GPIO 3','',3,22,15),
								new Gpio('DNC','Masse (GND)',-1,-1,17),
								new Gpio('MOSI','SPI',12,10,19),
								new Gpio('MISO','SPI',13,9,21),
								new Gpio('SCLK','SPI',14,11,23),
								new Gpio('DNC','',-1,-1,25),
							),
							array(
								new Gpio('5V','Alimentation',-1,-1,2),
								new Gpio('DNC','Masse (GND)',-1,-1,4),
								new Gpio('0V','Masse (GND)',-1,-1,6),
								new Gpio('TxD','UART (Transmission)',14,14,8),
								new Gpio('RxD','UART (Réception)',15,15,10),
								new Gpio('GPIO 1','',1,18,12),
								new Gpio('DNC','Masse (GND)',-1,-1,14),
								new Gpio('GPIO 4','',4,23,16),
								new Gpio('GPIO 5','',5,24,18),
								new Gpio('DNC','Masse (GND)',-1,-1,20),
								new Gpio('GPIO 6','',6,25,22),
								new Gpio('CE 0','SPI',10,8,24),
								new Gpio('CE 1','SPI',11,7,26),
							)
						);
		$pins['a2.0'] = $pins['b2.0'];
		
		// type B+
		$pins['b+1.0'] = array(
							array(
								//name,function,wiringPiNumber,bcmNumber,physicalNumber
								new Gpio('3.3V','Alimentation',-1,-1,1),
								new Gpio('SDA0','I2C',8,2,3),
								new Gpio('SCL0','I2C',9,3,5),
								new Gpio('GPIO 7','',7,4,7),
								new Gpio('DNC','Masse (GND)',-1,-1,9),
								new Gpio('GPIO 0','',0,17,11),
								new Gpio('GPIO 2','',2,27,13),
								new Gpio('GPIO 3','',3,22,15),
								new Gpio('DNC','Masse (GND)',-1,-1,17),
								new Gpio('MOSI','SPI',12,10,19),
								new Gpio('MISO','SPI',13,9,21),
								new Gpio('SCLK','SPI',14,11,23),
								new Gpio('DNC','',-1,-1,25),
								new Gpio('DNC','',-1,-1,27),
								new Gpio('GPIO 5','',-1,5,29),
								new Gpio('GPIO 6','',-1,6,31),
								new Gpio('GPIO 13','',-1,13,33),
								new Gpio('GPIO 19','',-1,19,35),
								new Gpio('GPIO 26','',-1,26,37),
								new Gpio('0V','Masse (GND)',-1,-1,39),

							),
							array(
								new Gpio('5V','Alimentation',-1,-1,2),
								new Gpio('5V','Alimentation',-1,-1,4),
								new Gpio('0V','Masse',-1,-1,6),
								new Gpio('TxD','UART (Transmission)',15,15,8),
								new Gpio('RxD','UART (Réception)',16,16,10),
								new Gpio('GPIO 1','',1,1,12),
								new Gpio('0V','Masse (GND)',-1,-1,14),
								new Gpio('GPIO 4','',4,4,16),
								new Gpio('GPIO 5','',5,5,18),
								new Gpio('0V','Masse (GND)',-1,-1,20),
								new Gpio('GPIO 6','',6,6,22),
								new Gpio('CE 0','SPI',10,10,24),
								new Gpio('CE 1','SPI',11,11,26),
								new Gpio('SCL 0','I2C ID EEPROM',-1,-1,28),
								new Gpio('0V','Masse (GND)',-1,-1,30),
								new Gpio('GPIO 26','PWM0',26,26,32),
								new Gpio('0V','Masse (GND)',-1,-1,34),
								new Gpio('GPIO 27','',27,27,36),
								new Gpio('GPIO 28','',28,28,38),
								new Gpio('GPIO 29','',29,29,40),
								
							)
						);
$pins['a2.0'] = $pins['b2.0'];
		
		// type 2
		$pins['b1.1'] = array(
							array(
								//name,function,wiringPiNumber,bcmNumber,physicalNumber
								new Gpio('3.3V','Alimentation',-1,-1,1),
								new Gpio('PGIO 2','SDA1 I²C',8,2,3),
								new Gpio('GPIO 3','SCL1 I²C',9,3,5),
								new Gpio('GPIO 4 ','GPIO_GCLK',7,4,7),
								new Gpio('0V','Masse (GND)',-1,-1,9),
								new Gpio('GPIO 17','GPIO_GEN0',0,17,11),
								new Gpio('GPIO 27','GPIO_GEN2',2,27,13),
								new Gpio('GPIO 22','GPIO_GEN3',3,22,15),
								new Gpio('3.3V','Alimentation',-1,-1,17),
								new Gpio('GPIO 10','SPI_MOSI',12,10,19),
								new Gpio('GPIO 9','SPI_MISO',13,9,21),
								new Gpio('GPIO 11','SPI_CLK',14,11,23),
								new Gpio('0V','Masse (GND)',-1,-1,25),
								new Gpio('ID_SD','FC ID EEPROM',-1,-1,27),
								new Gpio('GPIO 5','',-1,5,29),
								new Gpio('GPIO 6','',-1,6,31),
								new Gpio('GPIO 13','',-1,13,33),
								new Gpio('GPIO 19','',-1,19,35),
								new Gpio('GPIO 26','',-1,26,37),
								new Gpio('0V','Masse (GND)',-1,-1,39),

							),
							array(
								new Gpio('5V','Alimentation',-1,-1,2),
								new Gpio('5V','Alimentation',-1,-1,4),
								new Gpio('0V','Masse',-1,-1,6),
								new Gpio('GPIO 14','(TXDO)',15,15,8),
								new Gpio('GPIO 15','(RXDO)',16,16,10),
								new Gpio('GPIO 18','(GPIO_GEN1)',1,1,12),
								new Gpio('0V','Masse (GND)',-1,-1,14),
								new Gpio('GPIO 23','(GPIO_GEN4)',4,4,16),
								new Gpio('GPIO 24','(GPIO_GEN5)',5,5,18),
								new Gpio('0V','Masse (GND)',-1,-1,20),
								new Gpio('GPIO 25','(GPIO_GEN6)',6,6,22),
								new Gpio('GPIO 8','(SPI_CEO_N)',10,10,24),
								new Gpio('GPIO 7','(SPI_CEO_N)',11,11,26),
								new Gpio('ID_SC','(I2C ID EEPROM)',-1,-1,28),
								new Gpio('0V','Masse (GND)',-1,-1,30),
								new Gpio('GPIO 12','',26,26,32),
								new Gpio('0V','Masse (GND)',-1,-1,34),
								new Gpio('GPIO 16','',27,27,36),
								new Gpio('GPIO 20','',28,28,38),
								new Gpio('GPIO 21','',29,29,40),
								
							)
						);
		
		return isset($pins[$model])?$pins[$model]:$pins['b1.0'];
	}
	
	public static function getModel(){
		$infos = self::getInfos();
		$deductionArray = array(
			'0002' => array('ram'=>'256','version'=>'1.0','type'=>'b'),
			'0003' => array('ram'=>'256','version'=>'1.0+ecn0001','type'=>'b'),
			'0004' => array('ram'=>'256','version'=>'2.0','type'=>'b'),
			'0005' => array('ram'=>'256','version'=>'2.0','type'=>'b'),
			'0006' => array('ram'=>'256','version'=>'2.0','type'=>'b'),
			'0007' => array('ram'=>'256','version'=>'1.0','type'=>'a'),
			'0008' => array('ram'=>'256','version'=>'1.0','type'=>'a'),
			'0009' => array('ram'=>'256','version'=>'1.0','type'=>'a'),
			'0010' => array('ram'=>'512','version'=>'1.0','type'=>'b+'),
			'0011' => array('ram'=>'512','version'=>'1.0','type'=>'compute'),
			'0012' => array('ram'=>'256','version'=>'1.0','type'=>'a+'),
			'000d' => array('ram'=>'512','version'=>'2.0','type'=>'b'),
			'000e' => array('ram'=>'512','version'=>'2.0','type'=>'b'),
			'a21041' => array('ram'=>'1000','version'=>'1.1','type'=>'b'),
		);
		if(PHP_OS=='WINNT') return array('ram'=>'256','version'=>'1.0','type'=>'b');//for dev mode on windows only
		return isset($deductionArray[$infos['Revision']]) ? $deductionArray[$infos['Revision']] :'unknown';
	}

	public static function commandSilent($cmd){
		Functions::log('Launch system command (without output): '.$cmd);
		return shell_exec($cmd);
	}
	

	public static function command($cmd){
		Functions::log('Launch system command : '.$cmd);
		return system($cmd);
	}
	
	public static function gpio() {
		$model = self::getModel();
		$pinsRange = self::getPinForModel($model['type'],$model['version']);
		$gpios = array();
		foreach($pinsRange as $range){
				foreach($range as $pin){
					if(PHP_OS=='WINNT'){
						$gpios[$pin->wiringPiNumber] = rand(0,1);
						continue;
					}
					if($pin->wiringPiNumber<0) continue;
					$gpios[$i] = trim(exec("/usr/local/bin/gpio read ".$pin->wiringPiNumber, $out));
				}
		}
		
	
	
		return $gpios;
  }


	
}
?>

