<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3294f0b6b6d119682a481966dde52e62
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/BITM_Mgt_System/Team_Error_point',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static $classMap = array (
        'CGIF' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFCOLORTABLE' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFFILEHEADER' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFIMAGE' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFIMAGEHEADER' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'CGIFLZW' => __DIR__ . '/..' . '/mpdf/mpdf/classes/gif.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'FPDF_TPL' => __DIR__ . '/..' . '/setasign/fpdi/fpdf_tpl.php',
        'FPDI' => __DIR__ . '/..' . '/setasign/fpdi/fpdi.php',
        'FilterASCII85' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterASCII85.php',
        'FilterASCIIHexDecode' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterASCIIHexDecode.php',
        'FilterLZW' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterLZW.php',
        'INDIC' => __DIR__ . '/..' . '/mpdf/mpdf/classes/indic.php',
        'MYANMAR' => __DIR__ . '/..' . '/mpdf/mpdf/classes/myanmar.php',
        'OTLdump' => __DIR__ . '/..' . '/mpdf/mpdf/classes/otl_dump.php',
        'PDFBarcode' => __DIR__ . '/..' . '/mpdf/mpdf/classes/barcode.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SEA' => __DIR__ . '/..' . '/mpdf/mpdf/classes/sea.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'SVG' => __DIR__ . '/..' . '/mpdf/mpdf/classes/svg.php',
        'TTFontFile' => __DIR__ . '/..' . '/mpdf/mpdf/classes/ttfontsuni.php',
        'TTFontFile_Analysis' => __DIR__ . '/..' . '/mpdf/mpdf/classes/ttfontsuni_analysis.php',
        'UCDN' => __DIR__ . '/..' . '/mpdf/mpdf/classes/ucdn.php',
        'bmp' => __DIR__ . '/..' . '/mpdf/mpdf/classes/bmp.php',
        'cssmgr' => __DIR__ . '/..' . '/mpdf/mpdf/classes/cssmgr.php',
        'directw' => __DIR__ . '/..' . '/mpdf/mpdf/classes/directw.php',
        'fpdi_pdf_parser' => __DIR__ . '/..' . '/setasign/fpdi/fpdi_pdf_parser.php',
        'grad' => __DIR__ . '/..' . '/mpdf/mpdf/classes/grad.php',
        'mPDF' => __DIR__ . '/..' . '/mpdf/mpdf/mpdf.php',
        'meter' => __DIR__ . '/..' . '/mpdf/mpdf/classes/meter.php',
        'mpdfform' => __DIR__ . '/..' . '/mpdf/mpdf/classes/mpdfform.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'otl' => __DIR__ . '/..' . '/mpdf/mpdf/classes/otl.php',
        'pdf_context' => __DIR__ . '/..' . '/setasign/fpdi/pdf_context.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'tocontents' => __DIR__ . '/..' . '/mpdf/mpdf/classes/tocontents.php',
        'wmf' => __DIR__ . '/..' . '/mpdf/mpdf/classes/wmf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3294f0b6b6d119682a481966dde52e62::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3294f0b6b6d119682a481966dde52e62::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3294f0b6b6d119682a481966dde52e62::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3294f0b6b6d119682a481966dde52e62::$classMap;

        }, null, ClassLoader::class);
    }
}