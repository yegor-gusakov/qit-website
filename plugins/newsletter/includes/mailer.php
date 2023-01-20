<?php

use TNP\Mailer\PHPMailerLoader;

/**
 * @property string $to
 * @property string $to_name
 * @property string $subject
 * @property string $body
 * @property array  $headers
 * @property string $from
 * @property string $from_name
 */
class TNP_Mailer_Message {

	var $to_name = '';
	var $headers = array();
	var $user_id = 0;
	var $email_id = 0;
	var $error = '';
	var $subject = '';
	var $body = '';
	var $body_text = '';
	var $from = '';
	var $from_name = '';

}

/**
 * A basic class able to send one or more TNP_Mailer_Message objects using a
 * delivery method (wp-mail(), SMTP, API, ...).
 */
class NewsletterMailer {

	const ERROR_GENERIC = '1';
	const ERROR_FATAL = '2';

	/* @var NewsletterLogger */

	var $logger;
	var $name;
	var $options;
	private $delta;
	protected $batch_size = 1;
	protected $speed = 0;

	public function __construct( $name, $options = [] ) {
		$this->name    = $name;
		$this->options = $options;
		if ( ! empty( $this->options['speed'] ) ) {
			$this->speed = max( 0, (int) $this->options['speed'] );
		}
		if ( ! empty( $this->options['turbo'] ) ) {
			$this->batch_size = max( 1, (int) $this->options['turbo'] );
		}
		$this->get_logger()->debug( $options );
	}

	public function get_name() {
		return $this->name;
	}

	public function get_description() {
		return ucfirst( $this->name ) . ' Addon';
	}

	public function get_batch_size() {
		return $this->batch_size;
	}

	public function get_speed() {
		return $this->speed;
	}

	function send_with_stats( $message ) {
		$this->delta = microtime( true );
		$r           = $this->send( $message );
		$this->delta = microtime( true ) - $this->delta;

		return $r;
	}

	/**
	 *
	 * @param TNP_Mailer_Message $message
	 *
	 * @return bool|WP_Error
	 */
	public function send( $message ) {
		$message->error = 'No mailing system available';

		return new WP_Error( self::ERROR_FATAL, 'No mailing system available' );
	}

	public function send_batch_with_stats( $messages ) {
		$this->delta = microtime( true );
		$r           = $this->send_batch( $messages );
		$this->delta = microtime( true ) - $this->delta;

		return $r;
	}

	function get_capability() {
		return (int) ( 3600 * $this->batch_size / $this->delta );
	}

	/**
	 *
	 * @param TNP_Mailer_Message[] $messages
	 *
	 * @return bool|WP_Error
	 */
	public function send_batch( $messages ) {

		// We should not get there is the batch size is one, the caller should use "send()". We can get
		// there if the array of messages counts to one, since could be the last of a series of chunks.
		if ( $this->batch_size == 1 || count( $messages ) == 1 ) {
			$last_result = true;
			foreach ( $messages as $message ) {
				$r = $this->send( $message );
				if ( is_wp_error( $r ) ) {
					$last_result = $r;
				}
			}

			return $last_result;
		}

		// We should always get there
		if ( count( $messages ) <= $this->batch_size ) {
			return $this->send_chunk( $messages );
		}

		// We should not get here, since it is not optimized
		$chunks      = array_chunk( $message, $this->batch_size );
		$last_result = true;
		foreach ( $chunks as $chunk ) {
			$r = $this->send_chunk( $chunk );
			if ( is_wp_error( $r ) ) {
				$last_result = $r;
			}
		}

		return $last_result;
	}

	/**
	 * This one should be implemented by specilized classes.
	 *
	 * @param TNP_Mailer_Message[] $messages
	 *
	 * @return bool|WP_Error
	 */
	protected function send_chunk( $messages ) {
		$last_result = true;
		foreach ( $messages as $message ) {
			$r = $this->send( $message );
			if ( is_wp_error( $r ) ) {
				$last_result = $r;
			}
		}

		return $last_result;
	}

	/**
	 * @return NewsletterLogger
	 */
	function get_logger() {
		if ( $this->logger ) {
			return $this->logger;
		}
		$this->logger = new NewsletterLogger( $this->name . '-mailer' );

		return $this->logger;
	}

	/**
	 * Original mail function simulation for compatibility.
	 *
	 * @param string $to
	 * @param string $subject
	 * @param array  $message
	 * @param array  $headers
	 * @param bool   $enqueue
	 * @param type   $from Actually ignored
	 *
	 * @return type
	 * @deprecated
	 *
	 */
	public function mail(
		$to, $subject, $message, $headers = null, $enqueue = false,
		$from = false
	) {
		$mailer_message            = new TNP_Mailer_Message();
		$mailer_message->to        = $to;
		$mailer_message->subject   = $subject;
		$mailer_message->headers   = $headers;
		$mailer_message->body      = $message['html'];
		$mailer_message->body_text = $message['text'];

		return ! is_wp_error( $this->send( $mailer_message ) );
	}

	/**
	 * Used by bounce detection.
	 *
	 * @param int $time
	 */
	function save_last_run( $time ) {
		update_option( $this->prefix . '_last_run', $time );
	}

	/**
	 * Used by bounce detection.
	 *
	 * @param int $time
	 */
	function get_last_run() {
		return (int) get_option( $this->prefix . '_last_run', 0 );
	}

}

/**
 * Standard Mailer which uses the wp_mail() function of WP.
 */
class NewsletterDefaultMailer extends NewsletterMailer {

	var $filter_active = false;

	/** @var WP_Error */
	var $last_error = null;

	/**
	 * Static to be accessed in the hook: on some installation the object $this is not working, we're still trying to understand why
	 *
	 * @var TNP_Mailer_Message
	 */
	var $current_message = null;

	function __construct() {
		parent::__construct( 'default',
			Newsletter::instance()->get_options( 'smtp' ) );
		add_action( 'wp_mail_failed', [ $this, 'hook_wp_mail_failed' ] );
	}

	function hook_wp_mail_failed( $error ) {
		$this->last_error = $error;
	}

	function get_description() {
		// TODO: check if overloaded
		return 'wp_mail() WordPress function (could be extended by a SMTP plugin)';
	}

	function get_speed() {
		return (int) Newsletter::instance()->options['scheduler_max'];
	}

	function fix_mailer( $mailer ) {
		// If there is not a current message, wp_mail() was not called by us
		if ( is_null( $this->current_message ) ) {
			return;
		}

		$newsletter = Newsletter::instance();
		if ( isset( $this->current_message->encoding ) ) {
			$mailer->Encoding = $this->current_message->encoding;
		} else {
			if ( ! empty( $newsletter->options['content_transfer_encoding'] ) ) {
				$mailer->Encoding
					= $newsletter->options['content_transfer_encoding'];
			} else {
				// Setting and encoding sometimes conflict with SMTP plugins
				//$mailer->Encoding = 'base64';
			}
		}

		/* @var $mailer PHPMailer */
		$mailer->Sender = $newsletter->options['return_path'];

		// If there is an HTML body AND a text body, add the text part.
		if ( ! empty( $this->current_message->body )
		     && ! empty( $this->current_message->body_text )
		) {
			$mailer->AltBody = $this->current_message->body_text;
		}
	}

	function rekki_body() {
		$json
			  = file_get_contents( "https://staging3.qit.software/wp-json/wp/v2/posts" );
		$data = array();
		$data = json_decode( $json, true );
//print_r ($data);
		ob_start();
		?>
        <div class="max-width-100"
             style="width:100%;max-width:50%;display:inline-block;vertical-align: top;box-sizing: border-box;">
            <div style="padding:5px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                       style="margin-bottom: 20px">
                    <tbody>
                    <tr>
                        <td align="center" style="position:relative!important;">
                            <a href="https://staging3.qit.software/advantages-of-node-js-in-2023/"
                               target="_blank" rel="noopener nofollow"
                               style="width:100%; display: inline-block; font-size: 0; text-decoration: none; line-height: normal!important"><img
                                        style="width:100%;display:block;border-radius:15px!important;"
                                        src="https://staging3.qit.software/wp-content/uploads/newsletter/thumbnails/2022/11/frame-13-1-600x400-c.png"
                                        width="257" height="171" alt=""
                                        border="0" class=""></a>
                            <table class="rekki_button" border="0"
                                   cellpadding="0" cellspacing="0"
                                   role="presentation"
                                   style="margin: 0 auto;position:absolute;bottom:32px; right:32px;"
                                   align="center">
                                <tbody>
                                <tr>
                                    <td align="center" bgcolor="#FEF200"
                                        role="presentation"
                                        style="border:none;border-radius:59px;cursor:auto;mso-padding-alt:10px 25px;background:#FEF200"
                                        valign="middle">
	                                    <a href="https://staging3.qit.software/advantages-of-node-js-in-2023/"
	                                       style="display:inline-block;background:#FEF200;color:#363636;font-family:Inter, sans-serif;font-size:16px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:59px;"
                                                target="_blank">Read more</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


                    </tbody>
                </table>

                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                       class="responsive" style="margin: 0;">
                    <tbody>
                    <tr>
                        <td>

                            <table border="0" cellspacing="0" cellpadding="0"
                                   width="100%">


                                <tbody>
                                <tr>
                                    <td align="left"
                                        style="font-family: Verdana, Geneva, sans-serif; font-size: 26px; font-weight: normal; color: #222222; line-height: 1.3em; padding: 15px 0 0 0;"
                                        class="tnpc-row-edit tnpc-inline-editable"
                                        data-type="title" data-id="4234"
                                        dir="ltr">

                                        Advantages of Node.js for web
                                        development in 2023: the speed we all
                                        deserve
                                    </td>
                                </tr>
                                <tr>

                                    <td align="left">
                                        <span class="tag"
                                              style="font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.5;">IoT</span>

                                        <span class="tag"
                                              style="font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.5;">Mobile development</span>

                                        <span class="tag"
                                              style="font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.5;">Node.js</span>

                                        <span class="tag"
                                              style="font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.5;">Back-end</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td align="left"
                                        style="font-family: Verdana, Geneva, sans-serif; color: #222222; font-size: 14px; font-weight: normal; padding: 10px 0 0 0; font-style: italic; line-height: normal !important;">
                                        <svg width="14" height="14"
                                             viewBox="0 0 14 14" fill="none">
                                            <path d="M7.0013 8.16667C7.11667 8.16667 7.22946 8.13245 7.32539 8.06836C7.42131 8.00426 7.49608 7.91316 7.54023 7.80657C7.58438 7.69998 7.59594 7.58269 7.57343 7.46953C7.55092 7.35637 7.49536 7.25243 7.41378 7.17085C7.3322 7.08927 7.22826 7.03372 7.11511 7.01121C7.00195 6.9887 6.88466 7.00025 6.77807 7.0444C6.67148 7.08855 6.58038 7.16332 6.51628 7.25925C6.45218 7.35518 6.41797 7.46796 6.41797 7.58333C6.41797 7.73804 6.47943 7.88642 6.58882 7.99581C6.69822 8.10521 6.84659 8.16667 7.0013 8.16667ZM9.91797 8.16667C10.0333 8.16667 10.1461 8.13245 10.2421 8.06836C10.338 8.00426 10.4127 7.91316 10.4569 7.80657C10.501 7.69998 10.5126 7.58269 10.4901 7.46953C10.4676 7.35637 10.412 7.25243 10.3304 7.17085C10.2489 7.08927 10.1449 7.03372 10.0318 7.01121C9.91862 6.9887 9.80133 7.00025 9.69474 7.0444C9.58815 7.08855 9.49704 7.16332 9.43295 7.25925C9.36885 7.35518 9.33464 7.46796 9.33464 7.58333C9.33464 7.73804 9.39609 7.88642 9.50549 7.99581C9.61489 8.10521 9.76326 8.16667 9.91797 8.16667ZM7.0013 10.5C7.11667 10.5 7.22946 10.4658 7.32539 10.4017C7.42131 10.3376 7.49608 10.2465 7.54023 10.1399C7.58438 10.0333 7.59594 9.91602 7.57343 9.80286C7.55092 9.68971 7.49536 9.58577 7.41378 9.50419C7.3322 9.42261 7.22826 9.36705 7.11511 9.34454C7.00195 9.32203 6.88466 9.33359 6.77807 9.37774C6.67148 9.42189 6.58038 9.49666 6.51628 9.59258C6.45218 9.68851 6.41797 9.80129 6.41797 9.91667C6.41797 10.0714 6.47943 10.2197 6.58882 10.3291C6.69822 10.4385 6.84659 10.5 7.0013 10.5ZM9.91797 10.5C10.0333 10.5 10.1461 10.4658 10.2421 10.4017C10.338 10.3376 10.4127 10.2465 10.4569 10.1399C10.501 10.0333 10.5126 9.91602 10.4901 9.80286C10.4676 9.68971 10.412 9.58577 10.3304 9.50419C10.2489 9.42261 10.1449 9.36705 10.0318 9.34454C9.91862 9.32203 9.80133 9.33359 9.69474 9.37774C9.58815 9.42189 9.49704 9.49666 9.43295 9.59258C9.36885 9.68851 9.33464 9.80129 9.33464 9.91667C9.33464 10.0714 9.39609 10.2197 9.50549 10.3291C9.61489 10.4385 9.76326 10.5 9.91797 10.5ZM4.08464 8.16667C4.20001 8.16667 4.31279 8.13245 4.40872 8.06836C4.50465 8.00426 4.57941 7.91316 4.62357 7.80657C4.66772 7.69998 4.67927 7.58269 4.65676 7.46953C4.63425 7.35637 4.5787 7.25243 4.49711 7.17085C4.41553 7.08927 4.31159 7.03372 4.19844 7.01121C4.08528 6.9887 3.96799 7.00025 3.8614 7.0444C3.75481 7.08855 3.66371 7.16332 3.59961 7.25925C3.53551 7.35518 3.5013 7.46796 3.5013 7.58333C3.5013 7.73804 3.56276 7.88642 3.67216 7.99581C3.78155 8.10521 3.92993 8.16667 4.08464 8.16667ZM11.0846 2.33333H10.5013V1.75C10.5013 1.59529 10.4398 1.44692 10.3304 1.33752C10.2211 1.22812 10.0727 1.16667 9.91797 1.16667C9.76326 1.16667 9.61489 1.22812 9.50549 1.33752C9.39609 1.44692 9.33464 1.59529 9.33464 1.75V2.33333H4.66797V1.75C4.66797 1.59529 4.60651 1.44692 4.49711 1.33752C4.38772 1.22812 4.23935 1.16667 4.08464 1.16667C3.92993 1.16667 3.78155 1.22812 3.67216 1.33752C3.56276 1.44692 3.5013 1.59529 3.5013 1.75V2.33333H2.91797C2.45384 2.33333 2.00872 2.51771 1.68053 2.8459C1.35234 3.17408 1.16797 3.6192 1.16797 4.08333V11.0833C1.16797 11.5475 1.35234 11.9926 1.68053 12.3208C2.00872 12.649 2.45384 12.8333 2.91797 12.8333H11.0846C11.5488 12.8333 11.9939 12.649 12.3221 12.3208C12.6503 11.9926 12.8346 11.5475 12.8346 11.0833V4.08333C12.8346 3.6192 12.6503 3.17408 12.3221 2.8459C11.9939 2.51771 11.5488 2.33333 11.0846 2.33333ZM11.668 11.0833C11.668 11.238 11.6065 11.3864 11.4971 11.4958C11.3877 11.6052 11.2393 11.6667 11.0846 11.6667H2.91797C2.76326 11.6667 2.61489 11.6052 2.50549 11.4958C2.39609 11.3864 2.33464 11.238 2.33464 11.0833V5.83333H11.668V11.0833ZM11.668 4.66667H2.33464V4.08333C2.33464 3.92862 2.39609 3.78025 2.50549 3.67085C2.61489 3.56146 2.76326 3.5 2.91797 3.5H11.0846C11.2393 3.5 11.3877 3.56146 11.4971 3.67085C11.6065 3.78025 11.668 3.92862 11.668 4.08333V4.66667ZM4.08464 10.5C4.20001 10.5 4.31279 10.4658 4.40872 10.4017C4.50465 10.3376 4.57941 10.2465 4.62357 10.1399C4.66772 10.0333 4.67927 9.91602 4.65676 9.80286C4.63425 9.68971 4.5787 9.58577 4.49711 9.50419C4.41553 9.42261 4.31159 9.36705 4.19844 9.34454C4.08528 9.32203 3.96799 9.33359 3.8614 9.37774C3.75481 9.42189 3.66371 9.49666 3.59961 9.59258C3.53551 9.68851 3.5013 9.80129 3.5013 9.91667C3.5013 10.0714 3.56276 10.2197 3.67216 10.3291C3.78155 10.4385 3.92993 10.5 4.08464 10.5Z"
                                                  fill="#363636"></path>
                                        </svg>
                                        <span class="date"
                                              style="font-style: normal;font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;border-right: 1px solid rgba(54,54,54,.15); padding-right: 24px;   margin-right: 24px;">November 30, 2022</span>

                                        <span class="read"
                                              style="font-style: normal;font-weight: 400;font-size: 14px;line-height: 20px;color: #363636;opacity: 0.6;">10 min read</span>

                                    </td>
                                </tr>


                                <tr>
                                    <td style="padding: 10px">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
		<?php
		$result = ob_get_contents();
		ob_end_clean();

		return $result;

	}


	/**
	 *
	 * @param TNP_Mailer_Message $message
	 *
	 * @return \WP_Error|boolean
	 */
	function send( $message ) {

		if ( ! $this->filter_active ) {
			add_action( 'phpmailer_init', array( $this, 'fix_mailer' ), 100 );
			$this->filter_active = true;
		}

		$newsletter      = Newsletter::instance();
		$wp_mail_headers = [];
		if ( empty( $message->from ) ) {
			$message->from = $newsletter->options['sender_email'];
		}

		if ( empty( $message->from_name ) ) {
			$message->from_name = $newsletter->options['sender_name'];
		}

		$wp_mail_headers[] = 'From: "' . $message->from_name . '" <'
		                     . $message->from . '>';

		if ( ! empty( $newsletter->options['reply_to'] ) ) {
			$wp_mail_headers[] = 'Reply-To: '
			                     . $newsletter->options['reply_to'];
		}

		// Manage from and from name

		if ( ! empty( $message->headers ) ) {
			foreach ( $message->headers as $key => $value ) {
				$wp_mail_headers[] = $key . ': ' . $value;
			}
		}

		if ( ! empty( $message->body ) ) {
			$wp_mail_headers[] = 'Content-Type: text/html;charset=UTF-8';
			$body              = $message->body;
		} else if ( ! empty( $message->body_text ) ) {
			$wp_mail_headers[] = 'Content-Type: text/plain;charset=UTF-8';
			$body              = $message->body_text;
		} else {
			$message->error = 'Empty body';

			return new WP_Error( self::ERROR_GENERIC, 'Message format' );
		}

		$this->current_message = $message;

		$this->last_error      = null;
		$rekki_body            = $this->rekki_body();
		$r                     = wp_mail( $message->to, $message->subject,
			$body, $wp_mail_headers );
		$this->current_message = null;

		if ( ! $r ) {
			if ( $this->last_error && is_wp_error( $this->last_error ) ) {
				$error_message = $this->last_error->get_error_message();

				// Still not used
				$error_data = $this->last_error->get_error_data();
				$error_code = '';
				if ( isset( $mail_data['phpmailer_exception_code'] ) ) {
					$error_code = $mail_data['phpmailer_exception_code'];
				}

				if ( stripos( $error_message,
						'Could not instantiate mail function' )
				     || stripos( $error_message,
						'Failed to connect to mailserver' )
				) {
					return new WP_Error( self::ERROR_FATAL, $error_message );
				} else {
					return new WP_Error( self::ERROR_GENERIC, $error_message );
				}
			}

			// This code should be removed when sure...
			$last_error = error_get_last();
			if ( is_array( $last_error ) ) {
				$message->error = $last_error['message'];
				if ( stripos( $message->error,
						'Could not instantiate mail function' )
				     || stripos( $message->error,
						'Failed to connect to mailserver' )
				) {
					return new WP_Error( self::ERROR_FATAL,
						$last_error['message'] );
				} else {
					return new WP_Error( self::ERROR_GENERIC,
						$last_error['message'] );
				}
			} else {
				$message->error = 'No error explanation reported';

				return new WP_Error( self::ERROR_GENERIC,
					'No error message reported' );
			}
		}

		return true;
	}

}

/**
 * @deprecated since version 6.2.0
 * Internal SMTP mailer implementation (move to an SMTP plugin or use the
 * SMTP Addon).
 */
class NewsletterDefaultSMTPMailer extends NewsletterMailer {

	var $mailer = null;

	function __construct( $options ) {
		parent::__construct( 'internal-smtp', $options );
	}

	function get_description() {
		return 'Internal SMTP (deprecated)';
	}

	/**
	 *
	 * @param TNP_Mailer_Message $message
	 *
	 * @return \WP_Error|boolean
	 */
	public function send( $message ) {
		$logger = $this->get_logger();
		$logger->debug( 'Start sending to ' . $message->to );
		$mailer = $this->get_mailer();

		if ( ! empty( $message->body ) ) {
			$mailer->IsHTML( true );
			$mailer->Body    = $message->body;
			$mailer->AltBody = $message->body_text;
		} else {
			$mailer->IsHTML( false );
			$mailer->Body    = $message->body_text;
			$mailer->AltBody = '';
		}

		$mailer->Subject = $message->subject;

		$mailer->ClearCustomHeaders();
		if ( ! empty( $message->headers ) ) {
			foreach ( $message->headers as $key => $value ) {
				$mailer->AddCustomHeader( $key . ': ' . $value );
			}
		}

		if ( $message->from ) {
			$logger->debug( 'Alternative from available' );
			$mailer->setFrom( $message->from, $message->from_name );
		} else {
			$newsletter = Newsletter::instance();
			$mailer->setFrom( $newsletter->options['sender_email'],
				$newsletter->options['sender_name'] );
		}

		$mailer->ClearAddresses();
		$mailer->AddAddress( $message->to );
		$mailer->Send();

		if ( $mailer->IsError() ) {

			$logger->error( $mailer->ErrorInfo );
			// If the error is due to SMTP connection, the mailer cannot be reused since it does not clean up the connection
			// on error.
			//$this->mailer = null;
			$message->error = $mailer->ErrorInfo;

			return new WP_Error( self::ERROR_GENERIC, $mailer->ErrorInfo );
		}

		$logger->debug( 'Sent ' . $message->to );

		//$logger->error('Time: ' . (microtime(true) - $start) . ' seconds');
		return true;
	}

	/**
	 *
	 * @return PHPMailer
	 */
	function get_mailer() {
		global $wp_version;

		if ( $this->mailer ) {
			return $this->mailer;
		}

		$logger = $this->get_logger();
		$logger->debug( 'Setting up PHP mailer' );

		require_once 'PHPMailerLoader.php';
		$this->mailer = PHPMailerLoader::make_instance();

		$this->mailer->XMailer = ' '; // A space!

		$this->mailer->IsSMTP();
		$this->mailer->Host = $this->options['host'];
		if ( ! empty( $this->options['port'] ) ) {
			$this->mailer->Port = (int) $this->options['port'];
		}

		if ( ! empty( $this->options['user'] ) ) {
			$this->mailer->SMTPAuth = true;
			$this->mailer->Username = $this->options['user'];
			$this->mailer->Password = $this->options['pass'];
		}

		$this->mailer->SMTPSecure  = $this->options['secure'];
		$this->mailer->SMTPAutoTLS = false;

		if ( $this->options['ssl_insecure'] == 1 ) {
			$this->mailer->SMTPOptions = array(
				'ssl' => array(
					'verify_peer'       => false,
					'verify_peer_name'  => false,
					'allow_self_signed' => true
				)
			);
		}

		$newsletter = Newsletter::instance();

		$this->mailer->CharSet = 'UTF-8';
		$this->mailer->From    = $newsletter->options['sender_email'];

		if ( ! empty( $newsletter->options['return_path'] ) ) {
			$this->mailer->Sender = $newsletter->options['return_path'];
		}
		if ( ! empty( $newsletter->options['reply_to'] ) ) {
			$this->mailer->AddReplyTo( $newsletter->options['reply_to'] );
		}

		$this->mailer->FromName = $newsletter->options['sender_name'];


		return $this->mailer;
	}

}
