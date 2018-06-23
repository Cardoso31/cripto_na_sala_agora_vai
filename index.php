<?php 



	function posicao_da_letra($param_letra){
		$alfabeto = range('a', 'z');
		$posicao  = null;

		foreach ($alfabeto as $pos=>$letra) {
			if ($letra == $param_letra) {
				$posicao = $pos;
				break;
			}
		}
		return $posicao;
	}

	function letra_na_posicao($param_posicao){

		$alfabeto   = range('a', 'z');
		$letra_proc = null;
		
		foreach ($alfabeto as $pos=>$letra) {
			if ($pos == $param_posicao) {
				$letra_proc = $letra;
				break;
			}
		}

		return $letra_proc;
	}

	function cifrar_frase($param_frase, $param_chave){
		
		$alfabeto   = range('a', 'z');
		$num_letras = 26;
		$frase      = str_split($param_frase);
		$frase_cifrada = '';

		foreach ($frase as $letra) {

			$pos = (posicao_da_letra($letra)+$param_chave) % 26;			
			$frase_cifrada .= letra_na_posicao($pos);
		}

		echo "criptografada: ". $frase_cifrada;

	}

	function decifrar_frase(){

	}

	//ROTAS
	if (isset($_GET['acao']) && $_GET['acao'] == 'cifrar') {
		cifrar_frase($_POST['campo_frase'], $_POST['campo_chave']);
	}

	if (isset($_GET['acao']) && $_GET['acao'] == '????') {
		decifrar_frase();
	}


?>

<form method="post" action="?acao=cifrar">
	<textarea name="campo_frase" cols="30" rows="10"></textarea>
	<br />
	<input type="text" name="campo_chave" >
	<br />
	<input type="submit" value="criptografar">
</form>

<form method="post" action="?acao=?????">
	<textarea name="campo_frase" cols="30" rows="10"></textarea>
	<br />
	<input type="text" name="campo_chave" >
	<br />
	<input type="submit" value="decifrar">
</form>

