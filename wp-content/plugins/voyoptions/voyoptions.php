<?php
/*
 * Plugin Name: Voy Options
 * Description: Voy theme extra informartion stores in setting table
 */
class VoyOtionsPage
{
    private $options;

    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function add_plugin_page()
    {
        add_options_page(
            'Voy Options Page',
            'Voy Options',
            'manage_options',
            'my-setting-admin',
            array( $this, 'create_admin_page' )
        );
    }

    public function create_admin_page()
    {
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>Voy Options</h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields( 'my_option_group' );
                    do_settings_sections( 'my-setting-admin' );
                    submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function page_init()
    {
        register_setting(
            'my_option_group',
            'my_option_name',
            array( $this, 'sanitize' )
        );

        add_settings_section(
            'setting_section_id',
            '',
            array( $this, 'print_section_info' ),
            'my-setting-admin'
        );

        add_settings_field(
            'voy_address',
            'Address',
            array( $this, 'address_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'voy_contact_email',
            'Contact Email',
            array( $this, 'voy_contact_email_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'host_domain_email',
            'Host Domain Email',
            array( $this, 'host_domain_email_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );
    }
    public function print_section_info()
    {
        //print 'Enter your settings below:';
    }

    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['voy_address'] ) )
            $new_input['voy_address'] =  $input['voy_address'] ;

        if( isset( $input['voy_contact_email'] ) )
            $new_input['voy_contact_email'] =  $input['voy_contact_email'] ;

        if( isset( $input['host_domain_email'] ) )
            $new_input['host_domain_email'] =  $input['host_domain_email'] ;
        //print_r($new_input);exit;
        return $new_input;
    }

    public function address_callback()
    {

        /*printf(
            '<textarea rows="6" cols="45" id="address" name="my_option_name[address]"/>%s</textarea>',
            isset( $this->options['address'] ) ? esc_attr( $this->options['address']) : ''
        );*/

        wp_editor((isset($this->options['voy_address']) ? ($this->options['voy_address']) : ''), 'voy_address', array(
            'textarea_name' => 'my_option_name[voy_address]',
            'textarea_rows' => 5,
            'textarea_cols' => 10,
        ));

    }

    public function voy_contact_email_callback(){
        printf('<input type="text" name="my_option_name[voy_contact_email]" value="%s" size="45"/>',
            isset( $this->options['voy_contact_email'] ) ? esc_attr( $this->options['voy_contact_email']) : '');
    }

    public function host_domain_email_callback(){
        printf('<input type="text" name="my_option_name[host_domain_email]" value="%s" size="45"/>',
            isset( $this->options['host_domain_email'] ) ? esc_attr( $this->options['host_domain_email']) : '');
        printf('<p><small>Domain email address for sending email(s)</small></p>');
    }
}

if( is_admin() )
    $VoyOtionsPage = new VoyOtionsPage();