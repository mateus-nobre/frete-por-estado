<?php
/**
 * Mapa de Valor de Frete por Estado
 *
 * Plugin Name: Mapa - Frete por Estado.
 * Plugin URI:  https://creative-united.com.br
 * Description: Section para woocommerce, informação de frete médio por estado. Utilize o Shortcode [frete-por-estado].
 * Version:     1.0
 * Author:      Mateus Nobre de Oliveira - Creative United
 * Author URI:  https://creative-united.com.br
 */

class Frete_Por_Estado
{
    public function __construct(){}

    public function initialize(){

        include_once ABSPATH . 'wp-admin/includes/plugin.php';

    //Verifica se o plugin Jet-Engine está ativo. Usamos como dependencia padrão para CPT, para ganho de produtividade.
        if ( is_plugin_active( 'jet-engine/jet-engine.php' ) ) {
            self::hooks();
        } else {
            add_action( 'admin_notices', array(__CLASS__, 'mostraErro') );
        }

    }

    public function mostraErro(){
        ?>
            <div class="error">
                <p><b>Frete por Estado:</b> Erro! Este plugin faz uso do
                    <a href="https://crocoblock.com/plugins/jetengine/" target="_blank"
                         style="background: #9d64ed;
                                padding: 10px 10px 13px 10px;
                                color: white;
                                font-weight: 500;
                                display: inline-block;
                                margin-left: 10px;
                                text-decoration: none;
                                border-radius: 7px;">
                        Jet Engine
                    </a>
                </p>
            </div>
        <?php
    }

    // Seta padrão na ativação do plugin
    public static function activate() {
        register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
    }

    
    // Deletar options quando desinstala.    
    public static function uninstall() {
        delete_option( 'mapa-dinamico' );
    }

    public static function hooks()
    {
        // Shortcode para ativar o mapa.
        add_shortcode( 'frete-por-estado', array( __CLASS__, 'render_map' ) );

        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueues' ) );
    }

    public static function enqueues(){
        // Enqueues
        wp_enqueue_script('brmap', plugin_dir_url(__FILE__) . 'js/brmap.js', array(), 1.0 ,true );
        wp_enqueue_script('frete-por-estado', plugin_dir_url(__FILE__) . 'js/frete-por-estado.js', array('brmap'), 1.0 ,true );
    }

    public function render_map(){
        $states = get_option( 'mapa-dinamico' );

        $html = '';
        $html .= '<div style="max-width: 500px;"><div id="br_mine"></div>';
        $html .= '<label id="frete" style="width:300px; align:center;">Valor Médio do Frete:</label>';
        $html .= '<h1 id="valor-dinamico" class="valor-do-frete">R$ 0,00</h1>';
        $html .= '<script>';
        $html .= 'function mudarTitulo(novoTitulo) {document.querySelector("#valor-dinamico").innerHTML = novoTitulo;}';
        $html .= 'window.onload = () => {';
        foreach($states as $stateItem){
            foreach($stateItem as $state){
                $link = $state['link'];
                $sigla = strtolower($state['estado']);
                $valor = strtoupper($state['frete']);
                $html .= 'document.querySelector("#state_'.$sigla.'").setAttribute("target", "_blank");';
                $html .= 'document.querySelector("#state_'.$sigla.'").setAttribute("onclick", "mudarTitulo(`'.$valor.'`)");';
            }
        }
        $html .= '}';
        
        $html .= '</script>';

        return $html;
    }
}

add_action( 'plugins_loaded', array('Frete_Por_Estado', 'initialize') );
