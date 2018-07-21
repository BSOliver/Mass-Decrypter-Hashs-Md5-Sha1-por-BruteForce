<?php

$ind = "
 __  __               _____                             _   
|  \/  |             |  __ \                           | |  
| \  / | __ _ ___ ___| |  | | ___  ___ _ __ _   _ _ __ | |_ 
| |\/| |/ _` / __/ __| |  | |/ _ \/ __| '__| | | | '_ \| __|
| |  | | (_| \__ \__ \ |__| |  __/ (__| |  | |_| | |_) | |_ 
|_|  |_|\__,_|___/___/_____/ \___|\___|_|   \__, | .__/ \__|
                                             __/ | |        
                                            |___/|_|      
  _____ _    _         __     __  __ _____  _____ 
 / ____| |  | |   /\  /_ |  | |  \/  |  __ \| ____|
| (___ | |__| |  /  \  | |  | | \  / | |  | | |__  
 \___ \|  __  | / /\ \ | |  | | |\/| | |  | |___ \ 
 ____) | |  | |/ ____ \| |  | | |  | | |__| |___) |
|_____/|_|  |_/_/    \_\_|  | |_|  |_|_____/|____/    

 By: D4RKR0N

 Salve pros amigos: VandaTheGod - Malokin - Xin0x - Aj4x - Artr0n - Luiz - Neo Invasor - Plastyne - Tchelo.
";

if(isset($argv[1])){
	switch($argv[1]){
		case "-h" : echo $ind . "\nUso do script para quebrar várias hash md5 por lista: php $argv[0] --hashs endereco_do_arquivo_com_as_hashs --wordlist endereco_da_wordlist --tipo MD5\n\nUso do Script para quebrar várias hash sha1 por lista: php $argv[0] --hashs endereco_do_arquivo_com_as_hashs --wordlist endereco_da_wordlist --tipo SHA1";
		break;
		case "--hashs" : 
		if(isset($argv[2]) && file_exists($argv[2])){
		     $lista_hashs = file_get_contents($argv[2]);
		     $hashs = explode("\n", $lista_hashs);
		     if(isset($argv[4]) && file_exists($argv[4])){
		     	$wordlist = file_get_contents($argv[4]);
		     	$tentativas = explode("\n", $wordlist);
		     	echo $ind . "\n";
		     	if(isset($argv[6])){
		     		if($argv[6] == "MD5"){
		     			echo "As Hashs que forem descriptogradas serão salvas no diretório hashs/ e no arquivo hashs_descriptogradas.txt\n\nEfetuando Ataque...\n\n";
		     	foreach($hashs as $hash){
		     		foreach($tentativas as $pw){
		     			if(md5($pw) == $hash){
		     				echo "Hash Descriptografada: " . $hash . ":" . $pw . "\n";
		     				if(file_exists("hashs/")){
		     					$file = fopen("hashs/hashs_descriptogradas.txt","a");
		     				    fwrite($file, $hash . ":" . $pw . "\n");
		     				    fclose($file);
		     				}else{
		     					mkdir("hashs/");
		     					$file = fopen("hashs/hashs_descriptogradas.txt","a");
		     				    fwrite($file, $hash . ":" . $pw . "\n");
		     				    fclose($file);
		     				}
		     			}else{

		     			}
		     		}
		     		  }
		     		}elseif($argv[6] == "SHA1"){
		     			echo "As Hashs que forem descriptogradas serão salvas no diretório hashs/ e no arquivo hashs_descriptogradas.txt\n\nEfetuando Ataque...\n";
		     			foreach($hashs as $hash){
		     				foreach($tentativas as $pw){
		     					if(sha1($pw) == $hash){
		     						echo "Hash Descriptografada: " . $hash . ":" . $pw . "\n";
		     						if(file_exists("hashs/")){
		     					$file = fopen("hashs/hashs_descriptogradas.txt","a");
		     				    fwrite($file, $hash . ":" . $pw . "\n");
		     				    fclose($file);
		     				}else{
		     					mkdir("hashs/");
		     					$file = fopen("hashs/hashs_descriptogradas.txt","a");
		     				    fwrite($file, $hash . ":" . $pw . "\n");
		     				    fclose($file);
		     				}
		     					}else{
		     						
		     					}
		     				}
		     			}
		     		}else{
		     			echo $ind . "\nVocê não informou se deseja realizar ataque de força bruta em hashs MD5/SHA1 ou informou um tipo inválido.\n";
		     		}
		     	}else{
		     		echo $ind . "\nInforme o tipo.\n";

		     	}                
		     }elseif(isset($argv[4])){
		     	echo $ind . "\nWordList não informada.\n";
		     }else{
		     	echo $ind . "\nWordlist não encontrada.\n";
		     }
		}elseif(isset($argv[2]) == "0"){
			echo $ind . "\nLista não informada.\n";
		}else{
			echo $ind . "\nLista não encontrada.\n";
		}
		break;
		default : 
		echo $ind . "\nComando Desconhecido, Digite -h para saber o uso da ferramenta.\n";
	}
}else{
	echo $ind . "\nDigite -h para saber o uso da ferramenta.\n";
}
?>
