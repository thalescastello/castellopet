<?php
    function carregaView($pagina){
        include "view/header.html";
        include "view/".$pagina;
        include "view/footer.html";
    }
    function alert($texto){
        echo "<script>alert('$texto');</script>";
    }
    function redirect($url){
        header('Location: '.$url);
    }
    function conecta($bd = MYSQL_BD){
        $sqli =& new mysqlObj(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, $bd);
        $sqli = $sqli->getConexao();    
        return $sqli;
    }
    function formataData($data){
        $vetData = explode("/",$data);
        return $vetData[2]."-".$vetData[1]."-".$vetData[0];
    }
    function getTime(){
        $microtime = explode(" ", microtime());
        $time = $microtime[0] + $microtime[1];
        return $time;
    }
    function startExec(){
        global $time;
        $time = getTime();
    }
    function endExec(){
        global $time;      
        $finalTime = getTime();
        $execTime = $finalTime - $time;
        echo '<br>Tempo de execucao: ' . number_format($execTime, 6) . ' ms';
    }
    function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
    function anti_sql_injection($string){
        $string = preg_replace(mb_sql_regcase("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $string);
        $string = strip_tags($string);  # Remove tags HTML e PHP.
        $string = addslashes($string);  # Adiciona barras invertidas Ã© uma string.
        return $string;
    }
    function mb_sql_regcase($string,$encoding='auto'){
        $max=mb_strlen($string,$encoding);
        $ret='';
        for ($i = 0; $i < $max; $i++) {
            $char=mb_substr($string,$i,1,$encoding);
            $up=mb_strtoupper($char,$encoding);
            $low=mb_strtolower($char,$encoding);
            $ret.=($up!=$low)?'['.$up.$low.']' : $char;
        }
        return $ret;
    }
    function trocaFormatoData($date, $separador = "-"){
        if($separador == '-'){
            $ex = "/";
        }else{
            $ex = "-";
        }
        $data = explode($ex,$date);
        return $data[2].$separador.$data[1].$separador.$data[0];
    }
    function mascara($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    function geraLog($mensagem){
        $hoje = date("Y_m_d");
        $arquivo = fopen(TMP."log_.$hoje.txt", "ab");
        $hora = date("H:i:s T");
        fwrite($arquivo, "[$hora] $mensagem.\r\n");
        fclose($arquivo);
    }
    function calculaIdade($data_nascimento, $data_calcula){                                              
        $data_nascimento = strtotime($data_nascimento." 00:00:00");
        $data_calcula = strtotime($data_calcula." 00:00:00");
        $idade = floor(abs($data_calcula-$data_nascimento)/60/60/24/365);
        return($idade);
    }
    function enviaEmail($para, $de=EMAIL, $de_nome, $assunto, $corpo) {
        include_once(CLASSES."class.phpmailer.php"); 
        global $error;
        $mail =& new PHPMailer();
        $mail->IsSMTP();        // Ativar SMTP
        $mail->IsHTML(true);        
        $mail->SMTPDebug = 1;        // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;        // Autenticação ativada
        $mail->SMTPSecure = 'tls';    // SSL REQUERIDO pelo GMail
        $mail->Host = 'mail.subpav.org';    // SMTP utilizado
        $mail->Port = 25;          // A porta 587 deverá estar aberta em seu servidor
        $mail->Username = EMAIL;
        $mail->Password = SENHA_EMAIL;
        $mail->SetFrom($de, $de_nome);
        $mail->Subject = $assunto;
        $mail->Body = $corpo;
        $mail->AddAddress($para);
        if(!$mail->Send()) {
            $error = 'Mail error: '.$mail->ErrorInfo; 
            return false;
        } else {
            $error = 'Mensagem enviada!';
            return true;
        }
    }
?>