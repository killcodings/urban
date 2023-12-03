<?php

	class Translate {
		public static array $translates = [
			'en' => [
				'toc_show'            => 'Show',
				'toc_hide'            => 'Hide',
				'post_updated'        => 'Updated',
				'post_author'         => 'Post author',
				'posts'               => 'Posts',
				'comments'            => 'Comments',
				'placeholder_name'    => 'Name',
				'placeholder_email'   => 'Email',
				'placeholder_comment' => 'Comment',
				'comment_button'      => 'Comment',
				'share_social_link_title' => 'Share',
				'feedback-form__review-title' => 'Give your review a title',
				'feedback-form__review-subtitle' => 'What\'s important for people to know?'
			],
			'bn' => [
				'toc_show'            => 'দেখান',
				'toc_hide'            => 'লুকান',
				'post_updated'        => 'আপডেট করা হয়েছে',
				'post_author'         => 'পোস্ট লেখক',
				'posts'               => 'পোস্ট',
				'comments'            => 'মন্তব্যসমূহ',
				'placeholder_name'    => 'নাম',
				'placeholder_email'   => 'ইমেইল',
				'placeholder_comment' => 'মন্তব্য করুন',
				'comment_button'      => 'মন্তব্য করুন',
				'share_social_link_title' => 'ভাগ করুন',
				'feedback-form__review-title' => 'আপনার পর্যালোচনা একটি শিরোনাম দিন',
				'feedback-form__review-subtitle' => 'মানুষের জানা কী গুরুত্বপূর্ণ?'
			],
			'pt-br' => [
				'toc_show'            => 'Mostrar',
				'toc_hide'            => 'Esconder',
				'post_updated'        => 'Updated',
				'post_author'         => 'Post author',
				'posts'               => 'Posts',
				'comments'            => 'Comentários',
				'placeholder_name'    => 'Nome',
				'placeholder_email'   => 'Email',
				'placeholder_comment' => 'Comentário',
				'comment_button'      => 'Comentário',
				'share_social_link_title' => 'Compartilhar',
				'feedback-form__review-title' => 'Dê um título à sua avaliação',
				'feedback-form__review-subtitle' => 'O que é importante para as pessoas saberem?'
			],
			'pt-mz' => [
				'toc_show'            => 'Espetáculo de toc',
				'toc_hide'            => 'cultar o toc',
				'post_updated'        => 'Publicação actualizada',
				'post_author'         => 'Autor da publicação',
				'posts'               => 'Postos',
				'comments'            => 'Comentários',
				'placeholder_name'    => 'Nome',
				'placeholder_email'   => 'Email',
				'placeholder_comment' => 'Comentário',
				'comment_button'      => 'Comentário',
				'share_social_link_title' => 'Compartilhar',
				'feedback-form__review-title' => 'Dê um título à sua avaliação',
				'feedback-form__review-subtitle' => 'O que é importante para as pessoas saberem?'
			]
		];

		public static function getLang(): string {
			if ( strpos( $_SERVER['REQUEST_URI'], '/mz/' ) !== false ) {
				$current_lang = 'pt-mz';
			} elseif ( strpos( $_SERVER['REQUEST_URI'], '/br/' ) !== false ) {
				$current_lang = 'pt-br';
			} else {
//				$site_language_option = LANG_OPTIONS;
				$site_language_option = strtolower(get_bloginfo('language'));
				$current_lang = apply_filters( 'wpml_current_language', null ) ?? $site_language_option;
			}
			if ( $current_lang === 'en' || $current_lang === 'bn' || $current_lang === 'pt-br' || $current_lang === 'pt-mz' ) {
				return $current_lang;
			}
			return 'en';
		}

		public static function get( string $key ): string {

			return  self::$translates[ self::getLang() ][ $key ];
		}
	}
