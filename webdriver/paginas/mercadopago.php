<html lang="pt-BR">

<head>
    <meta http-equiv="origin-trial" content="3NNj0GXVktLOmVKwWUDendk4Vq2qgMVDBDX+Sni48ATJl9JBj+zF+9W2HGB3pvt6qowOihTbQgTeBm9SKbdTwYAAABfeyJvcmlnaW4iOiJodHRwczovL3JlY2FwdGNoYS5uZXQ6NDQzIiwiZmVhdHVyZSI6IlRwY2QiLCJleHBpcnkiOjE3MzUzNDM5OTksImlzVGhpcmRQYXJ0eSI6dHJ1ZX0=">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="HandheldFriendly" content="True">
    <meta http-equiv="cleartype" content="on">
    <meta name="browser-support" content="samesite=true">
    <meta name="csrf-token" content="fXDnLuL0-YJLIOwG11A3sW9d65gyx8tA9cO4">
    <title>Mercado Pago Brasil | Banco Digital</title>
    <meta name="robots" content="noindex, nofollow">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="shortcut icon" href="https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/6.7.71/mercadopago/favicon.svg" type="image/x-icon">
    <style>
        /*! CSS Used from: https://http2.mlstatic.com/frontend-assets/ui-navigation/6.7.50/mercadopago/navigation.css */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        html {
            text-size-adjust: 100%;
        }

        body {
            border-collapse: collapse;
            display: table;
            background-color: #fff;
            font-family: "Proxima Nova", -apple-system, Roboto, Arial, sans-serif,
                sans-serif;
            font-size: 16px;
            font-display: swap;
            font-weight: 400;
            table-layout: fixed;
            min-width: 320px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        a {
            color: var(--andes-color-blue-500, #009ee3);
            text-decoration: none;
        }

        a:active {
            color: #008ad6;
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        .nav-header,
        [role="main"] {
            display: table-row;
            width: 100%;
        }

        [role="main"] {
            height: 100%;
        }

        .nav-logo {
            background-image: url("https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/6.7.50/mercadopago/logo__small.png");
            background-repeat: no-repeat;
            display: inline-block;
            height: 35px;
            width: 50px;
            overflow: hidden;
            text-indent: -999px;
            top: 12.5px;
            left: 20px;
            z-index: 3;
            position: absolute;
        }

        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi),
        (min-resolution: 2dppx) {
            .nav-logo {
                background-image: url("https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/6.7.50/mercadopago/logo__small@2x.png");
                background-size: 50px 35px;
            }
        }

        .nav-header {
            background-color: #fff;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }

        .nav-header-menu-wrapper {
            height: 60px;
            position: relative;
        }

        .nav-header-menu-wrapper:after {
            box-shadow: 0 2px 4px 0 rgba(155, 169, 187, 0.3);
            content: "";
            display: block;
            position: absolute;
            z-index: 10;
            width: 100%;
            height: 2px;
            bottom: 0;
        }

        @media (min-width: 768px) {
            .nav-logo {
                background-image: url("https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/6.7.50/mercadopago/logo__large.png");
                top: 13.5px;
                left: 32px;
                width: 142px;
                height: 37px;
                background-size: 100%;
                background-position: center;
            }
        }

        @media (min-width: 768px) and (-webkit-min-device-pixel-ratio: 2),
        (min-width: 768px) and (min-resolution: 192dpi),
        (min-width: 768px) and (min-resolution: 2dppx) {
            .nav-logo {
                background-image: url("https://http2.mlstatic.com/frontend-assets/mp-web-navigation/ui-navigation/6.7.50/mercadopago/logo__large@2x.png");
                background-size: 142px 37px;
            }
        }

        @media (min-width: 768px) {
            .nav-header-menu-wrapper {
                height: 64px;
            }

            .nav-header-menu-container {
                max-width: 1280px;
                margin: 0 auto;
                position: relative;
            }
        }

        /*! CSS Used from: Embedded */
        .andes-form-control {
            display: block;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 18px;
            font-weight: 400;
            position: relative;
            -webkit-font-smoothing: antialiased;
            text-align: left;
        }

        .andes-form-control__control {
            position: relative;
        }

        .andes-form-control__control,
        .andes-form-control__field,
        .andes-form-control__label,
        .andes-form-control__message {
            display: block;
            width: 100%;
        }

        .andes-form-control__label {
            color: rgba(0, 0, 0, 0.55);
            font-size: 1em;
            line-height: 1;
            -webkit-transition: 0.2s ease-out;
            transition: 0.2s ease-out;
            -webkit-transition-property: color, -webkit-transform;
            transition-property: color, -webkit-transform;
            transition-property: transform, color;
            transition-property: transform, color, -webkit-transform;
        }

        .andes-form-control__field {
            background: transparent;
            border: 0;
            color: rgba(0, 0, 0, 0.9);
            font-family: inherit;
            font-size: inherit;
            line-height: normal;
            margin: 8px 0 4px;
            overflow: hidden;
            padding: 0;
            resize: none;
        }

        .andes-form-control:hover .andes-form-control__label {
            color: rgba(0, 0, 0, 0.55);
        }

        .andes-form-control__field:focus {
            outline: 0;
        }

        .andes-form-control--textfield .andes-form-control__label {
            color: rgba(0, 0, 0, 0.9);
            cursor: text;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.0714285714em;
            margin: 0 0 0.4285714286em 0.4285714286em;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-transform: unset !important;
            transform: unset !important;
            -webkit-transition: 0.2s ease-out;
            transition: 0.2s ease-out;
            -webkit-transition-property: color;
            transition-property: color;
            white-space: nowrap;
        }

        .andes-form-control--textfield .andes-form-control__control {
            -webkit-align-items: center;
            align-items: center;
            background-color: #fff;
            border-radius: 0.375em;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
            display: -webkit-flex;
            display: flex;
            font-size: 16px;
            min-height: 48px;
        }

        .andes-form-control--textfield .andes-form-control__field {
            border-radius: 0.375em;
            font-size: 16px;
            height: 22px;
            line-height: 22px;
            margin: 0;
            padding: 0.8125em 0.75em;
        }

        .andes-form-control--textfield .andes-form-control__field:focus {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        .andes-form-control--textfield .andes-form-control__field::placeholder {
            color: rgba(0, 0, 0, 0.25);
            font-size: 16px;
            opacity: 1;
        }

        .andes-form-control--textfield .andes-form-control__message {
            font-size: 13px;
            margin-top: 0;
        }

        .andes-form-control--textfield .andes-form-control__bottom {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            font-size: 13px;
            margin: 0.6153846154em 0 0 0.4615384615em;
        }

        .andes-form-control--textfield:hover .andes-form-control__label {
            color: rgba(0, 0, 0, 0.9) !important;
        }

        .andes-form-control__label,
        .andes-form-control__message {
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
        }

        .sr-only {
            border: 0;
            clip: rect(0 0 0 0);
            -webkit-clip-path: inset(50%);
            clip-path: inset(50%);
            height: 1px;
            margin: 0 -1px -1px 0;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .andes-form-control--textfield .andes-form-control__field {
            -webkit-flex-grow: 1;
            flex-grow: 1;
            width: auto;
        }

        .andes-form-control--textfield:last-child {
            margin-right: 0;
        }

        .andes-form-control__message {
            color: rgba(0, 0, 0, 0.55);
            font-size: 14px;
            line-height: 1em;
            margin-top: 0.3333333333em;
            min-height: 14px;
            opacity: 0;
            opacity: 1;
            text-align: left;
            -webkit-transition: opacity 0.15s ease-out;
            transition: opacity 0.15s ease-out;
        }

        input:focus {
            box-shadow: none;
        }

        body,
        html {
            font-size: 16px;
        }

        body {
            background: #fff;
        }

        .nav-header .nav-header-menu-wrapper:after {
            display: none;
        }

        .nav-header:before {
            content: none;
        }

        .grecaptcha-badge {
            display: none !important;
        }

        [data-site="MP"] .nav-header {
            background-color: var(--andes-color-fill-brand,
                    var(--andes-color-blue-500, #009ee3));
        }

        @media only screen and (min-width: 768px) {
            body {
                background: #ededed;
            }

            .nav-header {
                border-bottom: 0;
                box-shadow: none;
            }

            .andes-button {
                width: 100%;
            }

            [data-site="MP"] {
                background-color: #eee;
            }

            [data-site="MP"] .nav-logo {
                background-image: url(https://http2.mlstatic.com/frontend-assets/auth-login-frontend/4ea367c6c0eedeb0ae63.svg);
            }

            [data-site="MP"] .nav-header-menu-wrapper :after {
                content: none;
            }
        }

        @media screen and (min-width: 1024px) {

            body,
            html {
                font-size: 16px;
            }

            .nav-header {
                height: 3.5rem;
            }
        }

        .login-form__input {
            position: relative;
            z-index: 10;
        }

        a {
            color: var(--andes-color-blue-500, var(--andes-color-blue-500, #009ee3));
            text-decoration: none;
        }

        .sr-only {
            font-size: 0;
        }

        .grid-view__container>.grid-view__main>.grid-view__section--headers>h1.grid-view__title {
            margin: 0;
        }

        .grid-view__main>.grid-view__section--help>.grid-view__help-section>.grid-view__help-link {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            display: block;
            font-weight: 700;
            padding: 1rem;
            text-align: center;
            text-decoration: none;
        }

        @media (min-width: 1024px) {
            .grid-view__main>.grid-view__section--help>.grid-view__help-section>.grid-view__help-link {
                border: none;
                font-weight: 400;
                margin-top: 1.5rem;
                padding: 0;
                text-align: start;
            }
        }

        .grid-view__main>.grid-view__section--help>.grid-view__help-section {
            width: 100%;
        }

        @media (min-width: 1024px) {
            .grid-view__main>.grid-view__section--help>.grid-view__help-section {
                width: -webkit-fit-content;
                width: fit-content;
            }
        }

        .andes-typography {
            -webkit-font-smoothing: antialiased;
        }

        .feedback-container {
            background-color: #fff;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            height: 100%;
            -webkit-justify-content: center;
            justify-content: center;
            left: 0;
            opacity: 0;
            position: fixed;
            text-align: center;
            top: 0;
            -webkit-transition: opacity 1.5s ease 1s;
            transition: opacity 1.5s ease 1s;
            width: 100%;
            z-index: -1;
        }

        .asset__container {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .asset__container-icon {
            height: 4rem;
            width: 4rem;
        }

        @media (min-width: 1024px) {
            .feedback-container {
                background-color: transparent;
                position: absolute;
            }
        }

        .grid-view__container {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .grid-view__main {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto auto 1fr;
            min-height: -webkit-calc(100dvh - 48px);
            min-height: calc(100dvh - 48px);
            min-height: -webkit-calc(100dvh - 60px);
            min-height: calc(100dvh - 60px);
            padding: 0 1.25rem;
        }

        .grid-view__main>.andes-card--outline {
            border: none;
        }

        .grid-view__section--help {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            grid-row: 4;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .children-wrapper {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-grow: 1;
            flex-grow: 1;
            z-index: 1;
        }

        @media screen and (min-width: 1024px) {
            .grid-view__main {
                grid: -webkit-min-content -webkit-min-content 1fr/1fr auto;
                grid: min-content min-content 1fr/1fr auto;
                -webkit-column-gap: 2rem;
                column-gap: 2rem;
                grid-auto-flow: column;
                margin: 3rem 0 0;
                min-height: unset;
            }

            .grid-view__main>.andes-card--outline {
                border: 1px solid rgba(0, 0, 0, 0.1);
            }

            .grid-view__section--content {
                grid-row: 1/4;
                height: -webkit-fit-content;
                height: fit-content;
                max-width: 29rem;
                padding: 0;
            }

            .grid-view__section--content .andes-card__content {
                position: relative;
            }

            .grid-view__section--headers {
                width: 26.125rem;
            }

            .grid-view__section--help {
                display: block;
                grid-row: auto;
                position: unset;
                width: unset;
            }
        }

        .andes-button {
            border-radius: 6px;
            display: inline-block;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            height: 48px;
            line-height: 48px;
            padding: 0 24px;
            text-align: center;
            width: auto;
            -webkit-font-smoothing: antialiased;
        }

        .andes-button:focus {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            -moz-box-shadow: 0 0 0 2px #fff,
                0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            -webkit-box-shadow: 0 0 0 2px #fff,
                0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            outline: none;
        }

        .andes-button:focus:not(:focus-visible) {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            outline: none;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button {
                -webkit-transition: 0.18s ease-out;
                transition: 0.18s ease-out;
                -webkit-transition-property: background, color;
                transition-property: background, color;
            }
        }

        .andes-button:link {
            text-decoration: none;
        }

        .andes-button,
        .andes-button * {
            box-sizing: border-box;
        }

        .andes-button--full-width {
            display: block;
            width: 100%;
        }

        .andes-button:disabled {
            pointer-events: none;
        }

        .andes-button__content {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            height: 100%;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .andes-button__content:after {
            clear: both;
            content: "";
            display: table;
        }

        .andes-button--loud:hover {
            background-color: var(--andes-color-blue-500, #009ee3);
            border-color: transparent;
            color: #fff;
        }

        @media (min-width: 768px) {

            .andes-button--loud:hover,
            .andes-button--loud:link:hover,
            .andes-button--loud:visited:hover {
                background-color: var(--andes-color-blue-600, #007eb5);
                border-color: transparent;
                color: #fff;
            }
        }

        .andes-button--loud {
            box-shadow: 0 0 0 0 #fff;
            cursor: pointer;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--loud {
                -webkit-transition: box-shadow 0.25s ease-out,
                    background-color 0.2s ease-out;
                transition: box-shadow 0.25s ease-out, background-color 0.2s ease-out;
            }
        }

        .andes-button--loud,
        .andes-button--loud:focus,
        .andes-button--loud:link,
        .andes-button--loud:visited {
            background-color: var(--andes-color-blue-500, #009ee3);
            border-color: transparent;
            color: #fff;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--loud:hover {
                -webkit-transition: background-color 0.2s ease-in;
                transition: background-color 0.2s ease-in;
            }
        }

        .andes-button--loud:active {
            background-color: var(--andes-color-blue-700, #005e88);
            border-color: transparent;
            color: #fff;
        }

        .andes-button--loud:not(.andes-button--loading, .loading):disabled {
            background-clip: padding-box;
            background-color: rgba(0, 0, 0, 0.1);
            border-color: transparent;
            color: rgba(0, 0, 0, 0.25);
            cursor: default;
        }

        .andes-button--transparent:hover {
            background-color: transparent;
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        @media (min-width: 768px) {

            .andes-button--transparent:hover,
            .andes-button--transparent:link:hover,
            .andes-button--transparent:visited:hover {
                background-color: var(--andes-color-blue-100, rgba(71, 154, 209, 0.1));
                border-color: transparent;
                color: var(--andes-color-blue-500, #009ee3);
            }
        }

        .andes-button--transparent {
            box-shadow: 0 0 0 0 #fff;
            cursor: pointer;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--transparent {
                -webkit-transition: box-shadow 0.25s ease-out,
                    background-color 0.2s ease-out;
                transition: box-shadow 0.25s ease-out, background-color 0.2s ease-out;
            }
        }

        .andes-button--transparent,
        .andes-button--transparent:focus,
        .andes-button--transparent:link,
        .andes-button--transparent:visited {
            background-color: transparent;
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--transparent:hover {
                -webkit-transition: background-color 0.2s ease-in;
                transition: background-color 0.2s ease-in;
            }
        }

        .andes-button--transparent:active {
            background-color: var(--andes-color-blue-200, rgba(71, 154, 209, 0.2));
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        .andes-button--transparent:not(.andes-button--loading, .loading):disabled {
            background-clip: padding-box;
            background-color: transparent;
            border-color: transparent;
            color: rgba(0, 0, 0, 0.25);
            cursor: default;
        }

        .andes-button--loud:after,
        .andes-button--loud:before {
            background-color: var(--andes-color-blue-600, #007eb5);
            border-color: transparent;
            border-radius: 0.2222222222em;
            box-sizing: initial;
            color: #fff;
            content: "";
            height: 100%;
            left: 0;
            margin: -0.0555555556em;
            padding: 0.0555555556em;
            position: absolute;
            top: 0;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: left center;
            transform-origin: left center;
            width: 100%;
        }

        .andes-card--padding-0>.andes-card__content {
            padding: 0;
        }

        .andes-card {
            background-color: #fff;
            border-radius: 6px;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
        }

        .andes-card--outline {
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .andes-card> :first-child {
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .andes-card> :last-child {
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .andes-typography {
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
        }

        .andes-typography.andes-typography--type-body.andes-typography--weight-regular {
            font-weight: 400;
        }

        .andes-typography.andes-typography--type-title {
            font-weight: 600;
        }

        .andes-typography--size-xs.andes-typography--type-body {
            font-size: 12px;
            line-height: 15px;
        }

        .andes-typography--size-s.andes-typography--type-body {
            font-size: 14px;
            line-height: 18px;
        }

        .andes-typography--size-xl.andes-typography--type-title {
            font-size: 32px;
            line-height: 40px;
            margin: 1.25em 0 0;
        }

        .andes-typography--size-xl.andes-typography--type-title:first-child {
            margin: 0;
        }

        .andes-typography--color-primary {
            color: rgba(0, 0, 0, 0.9);
        }

        .andes-typography--color-secondary {
            color: rgba(0, 0, 0, 0.55);
        }

        .andes-typography--color-link {
            color: var(--andes-color-blue-500, var(--andes-color-blue-500, #009ee3));
        }

        a.andes-typography--color-link {
            text-decoration: none;
        }

        .login-footer {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column-reverse;
            flex-direction: column-reverse;
        }

        .login-footer--landscape {
            background-color: #f5f5f5;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            padding: 1.75rem;
        }

        .login-footer__container {
            font-size: 12px;
            font-size: 0.75rem;
            line-height: 1.25;
        }

        .login-footer__container--privacy {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
        }

        .login-footer__container--recaptcha {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }

        .login-footer__mercadolibre-copyright {
            margin: 0 1rem;
        }

        .login-footer--landscape .login-footer__mercadolibre-copyright {
            margin: 0;
        }

        .login-footer__recaptcha-link:before {
            color: rgba(0, 0, 0, 0.55);
            content: "-";
            margin-inline: 0.25rem;
        }

        @media (min-width: 768px) {

            .login-footer,
            .login-footer__container--privacy {
                -webkit-flex-direction: row;
                flex-direction: row;
            }

            .login-footer__container--privacy {
                -webkit-align-items: unset;
                align-items: unset;
                display: -webkit-flex;
                display: flex;
            }

            .login-footer__container--recaptcha {
                margin-bottom: 0;
            }

            .login-footer--landscape {
                padding: 1.75rem 2.5rem;
            }

            .login-footer--landscape .login-footer__mercadolibre-copyright:before {
                color: rgba(0, 0, 0, 0.55);
                content: "-";
                margin-inline: 0.25rem;
            }

            .login-footer__mercadolibre-copyright {
                margin: 0 7rem;
            }
        }

        .andes-list {
            background-color: #fff;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 18px;
            font-weight: 400;
            line-height: 1;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .andes-list:focus {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        .andes-list__item {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            padding: 0 16px;
            position: relative;
        }

        .andes-list__item-anchor {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            margin: 0 -16px;
            outline: none;
            padding: 0 16px;
            text-decoration: none;
            width: 100%;
            width: -webkit-fill-available;
            width: fill-available;
        }

        .andes-list__item-anchor:before {
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .andes-list__item-anchor:focus {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        .andes-list__item-first-column {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-grow: 4;
            flex-grow: 4;
            margin-right: 12px;
        }

        .andes-list__item-second-column {
            display: -webkit-inline-flex;
            display: inline-flex;
        }

        .andes-list__item-second-column .andes-list__item-chevron {
            padding-left: 12px;
        }

        .andes-list__item-second-column .andes-list__item-chevron--top {
            -webkit-align-self: flex-start;
            align-self: flex-start;
        }

        .andes-list__item-primary {
            color: rgba(0, 0, 0, 0.9);
            display: block;
        }

        .andes-list__item-asset {
            margin-bottom: auto;
        }

        .andes-list__item-asset--icon-one-line {
            margin-bottom: 0;
        }

        .andes-list__item--size-small .andes-list__item-first-column,
        .andes-list__item--size-small .andes-list__item-second-column {
            padding: 11px 0;
        }

        .andes-list__item--size-small .andes-list__item-second-column {
            height: 32px;
        }

        .andes-list__item--size-small .andes-list__item-asset {
            margin-right: 12px;
        }

        .andes-list__item--size-small .andes-list__item-asset--icon {
            margin-right: 0;
        }

        .andes-list__item--size-small .andes-list__item-asset--icon>svg {
            margin-right: 8px;
        }

        .andes-list__item--size-small .andes-list__item-primary {
            font-size: 14px;
            line-height: 18px;
        }

        .andes-list--selectable .andes-list__item:hover {
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .andes-list--selectable .andes-list__item:hover {
                background-color: rgba(0, 0, 0, 0.04);
            }
        }

        .andes-list--selectable .andes-list__item {
            cursor: pointer;
        }

        .andes-list--selectable .andes-list__item:hover {
            -webkit-transition: background-color 0.1s ease-out;
            transition: background-color 0.1s ease-out;
        }

        .security-problem {
            border-radius: 8px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.1);
            margin: 0 0 0.5rem;
            width: 100%;
        }

        .andes-list__item-second-column .andes-list__item-chevron--top {
            -webkit-align-self: center;
            align-self: center;
            display: -webkit-flex;
            display: flex;
        }

        .andes-list__item--size-small .andes-list__item-second-column {
            height: inherit;
        }

        .andes-list__item-text {
            margin-left: 0.75rem;
            width: -webkit-max-content;
            width: max-content;
        }

        @media screen and (min-width: 1024px) {
            .security-problem {
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.12);
                margin-bottom: 1.5rem;
                width: 20.25rem;
            }
        }

        body[data-site="MP"] {
            background-color: #fff;
        }

        .login-form {
            padding-top: 1rem;
            width: 100%;
        }

        .login-form__input {
            width: 100%;
        }

        .login-form__actions {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            margin: 0.75rem 0 2rem;
        }

        .login-form__actions #registration-link {
            margin-top: 0.5rem;
        }

        .grid-view__container>.grid-view__main>.grid-view__section--headers {
            margin-top: 1rem;
        }

        .grid-view__container>.grid-view__main>.grid-view__section--help>.grid-view__help-section>.grid-view__help-link {
            border: none;
        }

        @media only screen and (min-width: 1024px) {
            .login-form {
                box-sizing: border-box;
                padding: 2rem;
                width: 29rem;
            }

            .login-form__actions {
                -webkit-flex-direction: row;
                flex-direction: row;
                margin: 0.75rem 0 0;
            }

            .login-form__actions #registration-link {
                margin: 0;
            }

            .login-form__submit {
                margin-right: 0.5rem;
            }

            .login-form .andes-button {
                display: inline-block;
                line-height: 1;
                width: auto;
            }

            .login-form .andes-button+.andes-button {
                margin: 0;
            }

            .security-problem {
                margin-top: 9rem;
            }

            .grid-view__container>.grid-view__main>.grid-view__section--headers {
                margin-top: 0;
            }
        }

        a,
        a:hover,
        a:link,
        a:visited {
            color: var(--andes-color-blue-500, var(--andes-color-blue-500, #009ee3));
        }

        /*! CSS Used from: Embedded */
        body {
            --andes-color-yellow-500: #ffe600;
            --andes-color-blue-100: rgba(65, 137, 230, 0.1);
            --andes-color-blue-150: rgba(65, 137, 230, 0.15);
            --andes-color-blue-200: rgba(65, 137, 230, 0.2);
            --andes-color-blue-300: rgba(65, 137, 230, 0.3);
            --andes-color-blue-400: rgba(65, 137, 230, 0.4);
            --andes-color-blue-500: #3483fa;
            --andes-color-blue-600: #2968c8;
            --andes-color-blue-700: #1f4e96;
            --andes-color-blue-800: #183c73;
            --andes-color-fill-brand: var(--andes-color-yellow-500);
            --andes-color-text-brand: rgba(0, 0, 0, 0.9);
            --andes-landings-color-fill-brand: var(--andes-color-yellow-500);
            --andes-landings-color-fill-brand-secondary: #ffd400;
            --andes-landings-color-fill-brand-tertiary: #ffe600;
            --andes-landings-color-middle: #333333;
            --andes-landings-button-theme-white-background: #3483fa;
            --andes-landings-button-theme-white-text-color: #ffffff;
            --andes-landings-button-theme-white-hover-background: #2968c8;
            --andes-landings-button-theme-white-pressed-background: #1f4e96;
        }

        /*! CSS Used from: Embedded */
        *:focus {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px #007eb5,
                0 0 0 5px rgba(71, 154, 209, 0.3);
            outline: none;
        }

        *:focus:not(:focus-visible) {
            box-shadow: none;
            outline: none;
        }

        /*! CSS Used fontfaces */
        @font-face {
            font-family: "Proxima Nova";
            font-weight: 300;
            font-display: swap;
            font-style: normal;
            src: url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-light.woff2) format("woff2"),
                url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-light.woff) format("woff");
        }

        @font-face {
            font-family: "Proxima Nova";
            font-weight: 400;
            font-display: swap;
            font-style: normal;
            src: url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-regular.woff2) format("woff2"),
                url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-regular.woff) format("woff");
        }

        @font-face {
            font-family: "Proxima Nova";
            font-weight: 600;
            font-display: swap;
            font-style: normal;
            src: url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-semibold.woff2) format("woff2"),
                url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-semibold.woff) format("woff");
        }

        @font-face {
            font-family: "Proxima Nova";
            font-weight: 300;
            font-display: swap;
            font-style: normal;
            src: url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-light.woff2) format("woff2"),
                url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-light.woff) format("woff");
        }

        @font-face {
            font-family: "Proxima Nova";
            font-weight: 400;
            font-display: swap;
            font-style: normal;
            src: url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-regular.woff2) format("woff2"),
                url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-regular.woff) format("woff");
        }

        @font-face {
            font-family: "Proxima Nova";
            font-weight: 600;
            font-display: swap;
            font-style: normal;
            src: url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-semibold.woff2) format("woff2"),
                url(https://http2.mlstatic.com/ui/webfonts/v3.0.0/proxima-nova/proximanova-semibold.woff) format("woff");
        }
    </style>
    <style>
        /*! CSS Used from: https://http2.mlstatic.com/frontend-assets/ui-navigation/6.7.50/mercadopago/navigation.css */
        /*! CSS Used from: Embedded */
        .andes-button {
            border-radius: 6px;
            display: inline-block;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            height: 48px;
            line-height: 48px;
            padding: 0 24px;
            text-align: center;
            width: auto;
            -webkit-font-smoothing: antialiased;
        }

        .andes-button:focus {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            -moz-box-shadow: 0 0 0 2px #fff,
                0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            -webkit-box-shadow: 0 0 0 2px #fff,
                0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            outline: none;
        }

        .andes-button:focus:not(:focus-visible) {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            outline: none;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button {
                -webkit-transition: 0.18s ease-out;
                transition: 0.18s ease-out;
                -webkit-transition-property: background, color;
                transition-property: background, color;
            }
        }

        .andes-button:link {
            text-decoration: none;
        }

        .andes-button,
        .andes-button * {
            box-sizing: border-box;
        }

        .andes-button:disabled {
            pointer-events: none;
        }

        .andes-button__content {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            height: 100%;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .andes-button__content:after {
            clear: both;
            content: "";
            display: table;
        }

        .andes-button--loud:hover {
            background-color: var(--andes-color-blue-500, #009ee3);
            border-color: transparent;
            color: #fff;
        }

        @media (min-width: 768px) {

            .andes-button--loud:hover,
            .andes-button--loud:link:hover,
            .andes-button--loud:visited:hover {
                background-color: var(--andes-color-blue-600, #007eb5);
                border-color: transparent;
                color: #fff;
            }
        }

        .andes-button--loud {
            box-shadow: 0 0 0 0 #fff;
            cursor: pointer;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--loud {
                -webkit-transition: box-shadow 0.25s ease-out,
                    background-color 0.2s ease-out;
                transition: box-shadow 0.25s ease-out, background-color 0.2s ease-out;
            }
        }

        .andes-button--loud,
        .andes-button--loud:focus,
        .andes-button--loud:link,
        .andes-button--loud:visited {
            background-color: var(--andes-color-blue-500, #009ee3);
            border-color: transparent;
            color: #fff;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--loud:hover {
                -webkit-transition: background-color 0.2s ease-in;
                transition: background-color 0.2s ease-in;
            }
        }

        .andes-button--loud:active {
            background-color: var(--andes-color-blue-700, #005e88);
            border-color: transparent;
            color: #fff;
        }

        .andes-button--loud:not(.andes-button--loading, .loading):disabled {
            background-clip: padding-box;
            background-color: rgba(0, 0, 0, 0.1);
            border-color: transparent;
            color: rgba(0, 0, 0, 0.25);
            cursor: default;
        }

        .andes-button--quiet:hover {
            background-color: var(--andes-color-blue-150, rgba(71, 154, 209, 0.15));
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        @media (min-width: 768px) {

            .andes-button--quiet:hover,
            .andes-button--quiet:link:hover,
            .andes-button--quiet:visited:hover {
                background-color: var(--andes-color-blue-200, rgba(71, 154, 209, 0.2));
                border-color: transparent;
                color: var(--andes-color-blue-500, #009ee3);
            }
        }

        .andes-button--quiet {
            box-shadow: 0 0 0 0 #fff;
            cursor: pointer;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--quiet {
                -webkit-transition: box-shadow 0.25s ease-out,
                    background-color 0.2s ease-out;
                transition: box-shadow 0.25s ease-out, background-color 0.2s ease-out;
            }
        }

        .andes-button--quiet,
        .andes-button--quiet:focus,
        .andes-button--quiet:link,
        .andes-button--quiet:visited {
            background-color: var(--andes-color-blue-150, rgba(71, 154, 209, 0.15));
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--quiet:hover {
                -webkit-transition: background-color 0.2s ease-in;
                transition: background-color 0.2s ease-in;
            }
        }

        .andes-button--quiet:active {
            background-color: var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        .andes-button--quiet:not(.andes-button--loading, .loading):disabled {
            background-clip: padding-box;
            background-color: rgba(0, 0, 0, 0.1);
            border-color: transparent;
            color: rgba(0, 0, 0, 0.25);
            cursor: default;
        }

        .andes-button--quiet:after,
        .andes-button--quiet:before {
            background-color: var(--andes-color-blue-200, rgba(71, 154, 209, 0.2));
            border-color: transparent;
            border-radius: 0.2222222222em;
            box-sizing: initial;
            color: var(--andes-color-blue-500, #009ee3);
            content: "";
            height: 100%;
            left: 0;
            margin: -0.0555555556em;
            padding: 0.0555555556em;
            position: absolute;
            top: 0;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: left center;
            transform-origin: left center;
            width: 100%;
        }

        .andes-button--loud:after,
        .andes-button--loud:before {
            background-color: var(--andes-color-blue-600, #007eb5);
            border-color: transparent;
            border-radius: 0.2222222222em;
            box-sizing: initial;
            color: #fff;
            content: "";
            height: 100%;
            left: 0;
            margin: -0.0555555556em;
            padding: 0.0555555556em;
            position: absolute;
            top: 0;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: left center;
            transform-origin: left center;
            width: 100%;
        }

        .andes-form-control {
            display: block;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 18px;
            font-weight: 400;
            position: relative;
            -webkit-font-smoothing: antialiased;
            text-align: left;
        }

        .andes-form-control__control {
            position: relative;
        }

        .andes-form-control__control,
        .andes-form-control__field,
        .andes-form-control__label,
        .andes-form-control__message {
            display: block;
            width: 100%;
        }

        .andes-form-control__label {
            color: rgba(0, 0, 0, 0.55);
            font-size: 1em;
            line-height: 1;
            -webkit-transition: 0.2s ease-out;
            transition: 0.2s ease-out;
            -webkit-transition-property: color, -webkit-transform;
            transition-property: color, -webkit-transform;
            transition-property: transform, color;
            transition-property: transform, color, -webkit-transform;
        }

        .andes-form-control__field {
            background: transparent;
            border: 0;
            color: rgba(0, 0, 0, 0.9);
            font-family: inherit;
            font-size: inherit;
            line-height: normal;
            margin: 8px 0 4px;
            overflow: hidden;
            padding: 0;
            resize: none;
        }

        .andes-form-control:hover .andes-form-control__label {
            color: rgba(0, 0, 0, 0.55);
        }

        .andes-form-control__field:focus {
            outline: 0;
        }

        .andes-form-control--focused .andes-form-control__label {
            cursor: text;
        }

        .andes-form-control--textfield .andes-form-control__label {
            color: rgba(0, 0, 0, 0.9);
            cursor: text;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.0714285714em;
            margin: 0 0 0.4285714286em 0.4285714286em;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-transform: unset !important;
            transform: unset !important;
            -webkit-transition: 0.2s ease-out;
            transition: 0.2s ease-out;
            -webkit-transition-property: color;
            transition-property: color;
            white-space: nowrap;
        }

        .andes-form-control--textfield .andes-form-control__control {
            -webkit-align-items: center;
            align-items: center;
            background-color: #fff;
            border-radius: 0.375em;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
            display: -webkit-flex;
            display: flex;
            font-size: 16px;
            min-height: 48px;
        }

        .andes-form-control--textfield .andes-form-control__field {
            border-radius: 0.375em;
            font-size: 16px;
            height: 22px;
            line-height: 22px;
            margin: 0;
            padding: 0.8125em 0.75em;
        }

        .andes-form-control--textfield .andes-form-control__field:focus {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        .andes-form-control--textfield .andes-form-control__field::placeholder {
            color: rgba(0, 0, 0, 0.25);
            font-size: 16px;
            opacity: 1;
        }

        .andes-form-control--textfield .andes-form-control__message {
            font-size: 13px;
            margin-top: 0;
        }

        .andes-form-control--textfield .andes-form-control__bottom {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            font-size: 13px;
            margin: 0.6153846154em 0 0 0.4615384615em;
        }

        .andes-form-control--focused .andes-form-control__control {
            border-color: transparent;
            box-shadow: 0 0 0 0.125em var(--andes-color-blue-500, #009ee3);
            -moz-box-shadow: 0 0 0 0.125em var(--andes-color-blue-500, #009ee3);
            -webkit-box-shadow: 0 0 0 0.125em var(--andes-color-blue-500, #009ee3);
            outline: none;
        }

        .andes-form-control--textfield:hover .andes-form-control__label {
            color: rgba(0, 0, 0, 0.9) !important;
        }

        .andes-form-control__label,
        .andes-form-control__message {
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
        }

        .andes-form-control--textfield .andes-form-control__field {
            -webkit-flex-grow: 1;
            flex-grow: 1;
            width: auto;
        }

        .andes-form-control--textfield:last-child {
            margin-right: 0;
        }

        .andes-form-control__message {
            color: rgba(0, 0, 0, 0.55);
            font-size: 14px;
            line-height: 1em;
            margin-top: 0.3333333333em;
            min-height: 14px;
            opacity: 0;
            opacity: 1;
            text-align: left;
            -webkit-transition: opacity 0.15s ease-out;
            transition: opacity 0.15s ease-out;
        }

        .andes-form-control--focused .andes-form-control__message {
            opacity: 1;
        }

        input:focus {
            box-shadow: none;
        }

        @media only screen and (min-width: 768px) {
            .andes-button {
                width: 100%;
            }
        }

        .login-form__row {
            margin: 0.625rem 0;
            min-height: 3.75rem;
            padding: 1.3125rem 0 0;
            position: relative;
            text-align: left;
        }

        .login-form__row--landscape {
            margin: 0;
            padding-top: 0;
            width: 25.5rem;
        }

        .login-form__input {
            position: relative;
            z-index: 10;
        }

        a {
            color: var(--andes-color-blue-500, var(--andes-color-blue-500, #009ee3));
            text-decoration: none;
        }

        .andes-card--padding-0>.andes-card__content {
            padding: 0;
        }

        .andes-card {
            background-color: #fff;
            border-radius: 6px;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
        }

        .andes-card--outline {
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .andes-card> :first-child {
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .andes-card> :last-child {
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .grid-view__container>.grid-view__main>.grid-view__section--headers>h1.grid-view__title {
            margin: 0;
        }

        .grid-view__main>.grid-view__section--help>.grid-view__help-section>.grid-view__help-link {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            display: block;
            font-weight: 700;
            padding: 1rem;
            text-align: center;
            text-decoration: none;
        }

        @media (min-width: 1024px) {
            .grid-view__main>.grid-view__section--help>.grid-view__help-section>.grid-view__help-link {
                border: none;
                font-weight: 400;
                margin-top: 1.5rem;
                padding: 0;
                text-align: start;
            }
        }

        .grid-view__main>.grid-view__section--help>.grid-view__help-section {
            width: 100%;
        }

        @media (min-width: 1024px) {
            .grid-view__main>.grid-view__section--help>.grid-view__help-section {
                width: -webkit-fit-content;
                width: fit-content;
            }
        }

        .andes-typography {
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .andes-typography.andes-typography--type-body.andes-typography--weight-regular {
            font-weight: 400;
        }

        .andes-typography.andes-typography--type-title {
            font-weight: 600;
        }

        .andes-typography--size-xs.andes-typography--type-body {
            font-size: 12px;
            line-height: 15px;
        }

        .andes-typography--size-s.andes-typography--type-body {
            font-size: 14px;
            line-height: 18px;
        }

        .andes-typography--size-xl.andes-typography--type-title {
            font-size: 32px;
            line-height: 40px;
            margin: 1.25em 0 0;
        }

        .andes-typography--size-xl.andes-typography--type-title:first-child {
            margin: 0;
        }

        .andes-typography--color-primary {
            color: rgba(0, 0, 0, 0.9);
        }

        .andes-typography--color-link {
            color: var(--andes-color-blue-500, var(--andes-color-blue-500, #009ee3));
        }

        a.andes-typography--color-link {
            text-decoration: none;
        }

        .andes-thumbnail--32 {
            height: 30px;
            width: 30px;
        }

        .andes-thumbnail--32 {
            -webkit-align-items: center;
            align-items: center;
            background-color: #fff;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .andes-thumbnail {
            box-sizing: initial;
            color: rgba(0, 0, 0, 0.9);
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-weight: 400;
            line-height: 1;
        }

        .andes-thumbnail.andes-thumbnail--32 {
            font-size: 14px;
        }

        .andes-thumbnail--circle {
            border: 1px solid rgba(0, 0, 0, 0.07);
            border-radius: 50%;
            overflow: hidden;
        }

        .andes-thumbnail--quiet {
            background-color: var(--andes-color-blue-100, rgba(71, 154, 209, 0.1));
            border: 0;
            color: var(--andes-color-blue-500, #009ee3);
        }

        .user-pill {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 1.5625rem;
            display: -webkit-flex;
            display: flex;
            grid-row: 1;
            margin: 1rem 0;
            padding: 0.5rem;
            width: -webkit-fit-content;
            width: fit-content;
        }

        .user-pill__body {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-justify-content: center;
            justify-content: center;
            padding: 0 0.75rem;
        }

        .user-pill__identifier {
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 0.9375rem;
            margin: 0 0 0.125rem;
        }

        .user-pill__change-user-link {
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 400;
            line-height: 0.9375rem;
            padding: 0;
            text-decoration: none;
            width: -webkit-fit-content;
            width: fit-content;
        }

        @media screen and (min-width: 1024px) {
            .user-pill {
                grid-row: auto;
                margin-bottom: 0;
            }
        }

        .feedback-container {
            background-color: #fff;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            height: 100%;
            -webkit-justify-content: center;
            justify-content: center;
            left: 0;
            opacity: 0;
            position: fixed;
            text-align: center;
            top: 0;
            -webkit-transition: opacity 1.5s ease 1s;
            transition: opacity 1.5s ease 1s;
            width: 100%;
            z-index: -1;
        }

        .asset__container {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .asset__container-icon {
            height: 4rem;
            width: 4rem;
        }

        @media (min-width: 1024px) {
            .feedback-container {
                background-color: transparent;
                position: absolute;
            }
        }

        .grid-view__main {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto auto 1fr;
            min-height: -webkit-calc(100dvh - 48px);
            min-height: calc(100dvh - 48px);
            min-height: -webkit-calc(100dvh - 60px);
            min-height: calc(100dvh - 60px);
            padding: 0 1.25rem;
        }

        .grid-view__main>.andes-card--outline {
            border: none;
        }

        .grid-view__section--help {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            grid-row: 4;
            -webkit-justify-content: center;
            justify-content: center;
        }

        .children-wrapper {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-grow: 1;
            flex-grow: 1;
            z-index: 1;
        }

        @media screen and (min-width: 1024px) {
            .grid-view__main {
                grid: -webkit-min-content -webkit-min-content 1fr/1fr auto;
                grid: min-content min-content 1fr/1fr auto;
                -webkit-column-gap: 2rem;
                column-gap: 2rem;
                grid-auto-flow: column;
                margin: 3rem 0 0;
                min-height: unset;
            }

            .grid-view__main>.andes-card--outline {
                border: 1px solid rgba(0, 0, 0, 0.1);
            }

            .grid-view__section--content {
                grid-row: 1/4;
                height: -webkit-fit-content;
                height: fit-content;
                max-width: 29rem;
                padding: 0;
            }

            .grid-view__section--content .andes-card__content {
                position: relative;
            }

            .grid-view__section--headers {
                width: 26.125rem;
            }

            .grid-view__section--help {
                display: block;
                grid-row: auto;
                position: unset;
                width: unset;
            }
        }

        .andes-list {
            background-color: #fff;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 18px;
            font-weight: 400;
            line-height: 1;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        .andes-list:focus {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        .andes-list__item {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            padding: 0 16px;
            position: relative;
        }

        .andes-list__item-anchor {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            margin: 0 -16px;
            outline: none;
            padding: 0 16px;
            text-decoration: none;
            width: 100%;
            width: -webkit-fill-available;
            width: fill-available;
        }

        .andes-list__item-anchor:before {
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .andes-list__item-anchor:focus {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        .andes-list__item-first-column {
            -webkit-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-grow: 4;
            flex-grow: 4;
            margin-right: 12px;
        }

        .andes-list__item-second-column {
            display: -webkit-inline-flex;
            display: inline-flex;
        }

        .andes-list__item-second-column .andes-list__item-chevron {
            padding-left: 12px;
        }

        .andes-list__item-second-column .andes-list__item-chevron--top {
            -webkit-align-self: flex-start;
            align-self: flex-start;
        }

        .andes-list__item-primary {
            color: rgba(0, 0, 0, 0.9);
            display: block;
        }

        .andes-list__item-asset {
            margin-bottom: auto;
        }

        .andes-list__item-asset--icon-one-line {
            margin-bottom: 0;
        }

        .andes-list__item--size-small .andes-list__item-first-column,
        .andes-list__item--size-small .andes-list__item-second-column {
            padding: 11px 0;
        }

        .andes-list__item--size-small .andes-list__item-second-column {
            height: 32px;
        }

        .andes-list__item--size-small .andes-list__item-asset {
            margin-right: 12px;
        }

        .andes-list__item--size-small .andes-list__item-asset--icon {
            margin-right: 0;
        }

        .andes-list__item--size-small .andes-list__item-asset--icon>svg {
            margin-right: 8px;
        }

        .andes-list__item--size-small .andes-list__item-primary {
            font-size: 14px;
            line-height: 18px;
        }

        .andes-list--selectable .andes-list__item:hover {
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .andes-list--selectable .andes-list__item:hover {
                background-color: rgba(0, 0, 0, 0.04);
            }
        }

        .andes-list--selectable .andes-list__item {
            cursor: pointer;
        }

        .andes-list--selectable .andes-list__item:hover {
            -webkit-transition: background-color 0.1s ease-out;
            transition: background-color 0.1s ease-out;
        }

        .security-problem {
            border-radius: 8px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.1);
            margin: 0 0 0.5rem;
            width: 100%;
        }

        .andes-list__item-second-column .andes-list__item-chevron--top {
            -webkit-align-self: center;
            align-self: center;
            display: -webkit-flex;
            display: flex;
        }

        .andes-list__item--size-small .andes-list__item-second-column {
            height: inherit;
        }

        .andes-list__item-text {
            margin-left: 0.75rem;
            width: -webkit-max-content;
            width: max-content;
        }

        @media screen and (min-width: 1024px) {
            .security-problem {
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.12);
                margin-bottom: 1.5rem;
                width: 20.25rem;
            }
        }

        .no-wrap-text {
            white-space: nowrap;
        }

        .login-form {
            padding-top: 1rem;
            width: 100%;
        }

        .login-form__actions {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            margin: 0.75rem 0 2rem;
        }

        .login-form__actions--decline {
            margin-top: 0.5rem;
        }

        .login-form__row--landscape {
            width: 100%;
        }

        .grid-view__container>.grid-view__main>.grid-view__section--help>.grid-view__help-section>.grid-view__help-link {
            border: none;
        }

        @media only screen and (min-width: 1024px) {
            .login-form {
                box-sizing: border-box;
                padding: 2rem;
                width: 29rem;
            }

            .login-form__actions {
                -webkit-flex-direction: row;
                flex-direction: row;
                margin: 0.75rem 0 0;
            }

            .login-form__actions--complete {
                margin-right: 0.5rem;
            }

            .login-form__actions--complete,
            .login-form__actions--decline {
                white-space: nowrap;
                width: -webkit-fit-content;
                width: fit-content;
            }

            .login-form__actions--decline {
                margin: 0;
            }

            .user-pill__change-user-link {
                cursor: pointer;
            }

            .security-problem {
                margin-top: 4.875rem;
            }
        }
    </style>
    <style>
        /*! CSS Used from: https://http2.mlstatic.com/frontend-assets/auth-totp-in-app-frontend/validation-mp.ebedd689.css */
        .grid-view__subtitle {
            margin: 0 0 0.5rem;
        }

        @media screen and (min-width: 1024px) {

            .grid-view__main>.grid-view__section--headers>.grid-view__title,
            .grid-view__subtitle {
                margin: 0;
            }
        }

        .andes-typography {
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .andes-typography.andes-typography--type-body.andes-typography--weight-regular {
            font-weight: 400;
        }

        .andes-typography.andes-typography--type-body.andes-typography--weight-semibold,
        .andes-typography.andes-typography--type-title {
            font-weight: 600;
        }

        .andes-typography--size-s.andes-typography--type-body {
            font-size: 14px;
            line-height: 18px;
        }

        p.andes-typography--size-s.andes-typography--type-body {
            margin: 0.71em 0 0;
        }

        p.andes-typography--size-s.andes-typography--type-body:first-child {
            margin: 0;
        }

        .andes-typography--size-m.andes-typography--type-body {
            font-size: 16px;
            line-height: 20px;
        }

        .andes-typography--size-xl.andes-typography--type-title {
            font-size: 32px;
            line-height: 40px;
            margin: 1.25em 0 0;
        }

        .andes-typography--color-primary {
            color: rgba(0, 0, 0, 0.9);
        }

        .andes-typography--color-secondary {
            color: rgba(0, 0, 0, 0.55);
        }

        .andes-typography--color-link {
            color: var(--andes-color-blue-500, var(--andes-color-blue-500, #009ee3));
        }

        a.andes-typography--color-link {
            text-decoration: none;
        }

        .feedback-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            left: 0;
            min-height: 100%;
            opacity: 0;
            position: fixed;
            text-align: center;
            top: 0;
            transition: opacity 1.5s ease 1s;
            width: 100%;
            z-index: -1;
        }

        .asset__container {
            display: flex;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .asset__container-icon {
            height: 4rem;
            width: 4rem;
        }

        @media (min-width: 1024px) {
            .feedback-container {
                position: absolute;
            }
        }

        .grid-view__container {
            display: flex;
            justify-content: center;
        }

        .grid-view__main {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto auto 1fr;
            min-height: calc(100dvh - 48px);
            min-height: calc(100dvh - 60px);
            padding: 0 1.25rem;
        }

        .grid-view__main>.andes-card--outline {
            border: none;
        }

        .grid-view__section--help {
            align-items: center;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            grid-row: 4;
            justify-content: center;
            margin: 0 -1.25rem;
            padding: 1rem;
        }

        .grid-view__divider {
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            display: none;
            margin: 1.5rem 0 0.75rem;
            width: 50%;
        }

        .children-wrapper {
            display: flex;
            flex-grow: 1;
            z-index: 1;
        }

        @media screen and (min-width: 1024px) {
            .grid-view__main {
                grid: minmax(10px, max-content) minmax(30px, max-content) auto/1fr 2fr;
                grid-auto-flow: column;
                margin: 3.75rem 0.5rem 0 0;
                min-height: unset;
                padding: 0 0 0 6.375rem;
            }

            .grid-view__main>.andes-card--outline {
                border: 1px solid rgba(0, 0, 0, 0.1);
            }

            .grid-view__section--content {
                grid-row: 1/4;
                height: -moz-fit-content;
                height: fit-content;
                max-width: 30.875rem;
                padding: 0;
            }

            .grid-view__section--content .andes-card__content {
                position: relative;
            }

            .grid-view__section--headers {
                width: 24.5rem;
            }

            .grid-view__section--help {
                border: none;
                display: block;
                grid-row: auto;
                margin: 0;
                padding: 0;
                position: unset;
                width: unset;
            }

            .grid-view__divider {
                display: block;
            }
        }

        @media screen and (min-width: 1200px) {
            .grid-view__main {
                padding: 0 0 0 12.75rem;
            }
        }

        .andes-button {
            border-radius: 6px;
            display: inline-block;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            height: 48px;
            line-height: 48px;
            padding: 0 24px;
            text-align: center;
            width: auto;
            -webkit-font-smoothing: antialiased;
        }

        .andes-button:focus {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            -moz-box-shadow: 0 0 0 2px #fff,
                0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            -webkit-box-shadow: 0 0 0 2px #fff,
                0 0 0 3px var(--andes-color-blue-600, #007eb5),
                0 0 0 5px var(--andes-color-blue-300, rgba(71, 154, 209, 0.3));
            outline: none;
        }

        .andes-button:focus:not(:focus-visible) {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            outline: none;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button {
                transition: 0.18s ease-out;
                transition-property: background, color;
            }
        }

        .andes-button:link {
            text-decoration: none;
        }

        .andes-button,
        .andes-button * {
            box-sizing: border-box;
        }

        .andes-button:disabled {
            pointer-events: none;
        }

        .andes-button__content {
            align-items: center;
            display: flex;
            height: 100%;
            justify-content: center;
        }

        .andes-button--transparent:hover {
            background-color: transparent;
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        @media (min-width: 768px) {

            .andes-button--transparent:hover,
            .andes-button--transparent:link:hover,
            .andes-button--transparent:visited:hover {
                background-color: var(--andes-color-blue-100, rgba(71, 154, 209, 0.1));
                border-color: transparent;
                color: var(--andes-color-blue-500, #009ee3);
            }
        }

        .andes-button--transparent {
            box-shadow: 0 0 0 0 #fff;
            cursor: pointer;
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--transparent {
                transition: box-shadow 0.25s ease-out, background-color 0.2s ease-out;
            }
        }

        .andes-button--transparent,
        .andes-button--transparent:focus,
        .andes-button--transparent:link,
        .andes-button--transparent:visited {
            background-color: transparent;
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        @media (prefers-reduced-motion: no-preference) {
            .andes-button--transparent:hover {
                transition: background-color 0.2s ease-in;
            }
        }

        .andes-button--transparent:active {
            background-color: var(--andes-color-blue-200, rgba(71, 154, 209, 0.2));
            border-color: transparent;
            color: var(--andes-color-blue-500, #009ee3);
        }

        .andes-button--transparent:not(.andes-button--loading, .loading):disabled {
            background-clip: padding-box;
            background-color: transparent;
            border-color: transparent;
            color: rgba(0, 0, 0, 0.25);
            cursor: default;
        }

        .andes-card--padding-0>.andes-card__content {
            padding: 0;
        }

        .andes-card {
            background-color: #fff;
            border-radius: 6px;
            font-family: Proxima Nova, -apple-system, Roboto, Arial, sans-serif;
        }

        .andes-card--outline {
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .andes-card> :first-child {
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .andes-card> :last-child {
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .validation-card {
            padding: 1.5rem;
        }

        .validation-card .grid-view__main {
            margin: 1.5rem 0 0;
        }

        .validation-card .grid-view__section--headers {
            margin-right: 7.8125rem;
            width: 23rem;
        }

        .validation-card .grid-view__section--headers .grid-view__subtitle.andes-typography--type-body {
            color: #737373;
        }

        .validation-card .grid-view__section--headers .andes-typography.grid-view__title.andes-typography--type-title.andes-typography--size-xl {
            margin-top: 0.5rem;
        }

        .validation-card .grid-view__section--help {
            margin-right: 7.8125rem;
            width: 23rem;
        }

        .validation-card .grid-view__section--content {
            height: 26.25rem;
            margin-top: 0;
            max-width: 38.75rem;
            width: 100%;
        }

        .validation-card .grid-view__section--content .andes-card__content {
            margin-top: 1.25rem;
        }

        .validation-card .grid-view__section--content .andes-card__content .children-wrapper {
            display: block;
        }

        .validation-card .grid-view__divider {
            display: none;
        }

        .validation-card__scan-description-ml,
        .validation-card__scan-help-login {
            margin-top: 0.5rem;
        }

        .validation-card__help-component {
            cursor: pointer;
        }

        .validation-card__button--reject {
            margin-top: 0.5rem;
        }

        .validation-card__qrcontainer {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .validation-card__qrcode {
            margin: 1.5rem auto 1rem;
        }

        .validation-card__reject-button--center {
            align-self: center;
            display: flex;
            justify-content: center;
        }

        @media screen and (min-width: 768px) {
            .validation-card {
                height: auto;
                padding: 2.5rem;
            }

            .validation-card--reject {
                padding-bottom: 1.5rem;
            }

            .validation-card__button--reject {
                margin-top: 0.5rem;
            }
        }

        @media screen and (min-width: 1024px) {
            .grid-view__main {
                padding: 0 0 0 7vw;
            }
        }
    </style>

    <style>
        .spinner {
            width: 100px;
            height: 100px;
            border: 4px solid #e0e0e0;
            border-top: 4px solid #3483fa;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body data-site="MP" data-country="BR">
    <header role="banner" class="nav-header">
        <div class="nav-header-menu-wrapper">
            <div class="nav-header-menu-container"><a class="nav-logo" href="#">Mercado Pago</a></div>
        </div>
    </header>
    <main role="main" id="root-app">
        <div class="identification" id="identification">
            <div class="grid-view__container">
                <div class="grid-view__main" id="bloco_login" style="display: grid;">
                    <div class="grid-view__section--headers">
                        <h1 class="andes-typography grid-view__title andes-typography--type-title andes-typography--size-xl andes-typography--color-primary andes-typography--weight-regular">Digite seu CPF, e-mail ou telefone para iniciar sessão</h1>
                    </div>
                    <div class="grid-view__section--help">
                        <div class="grid-view__help-section">
                            <ul class="andes-list security-problem andes-list--default andes-list--selectable" id=":R1dh:">
                                <li class="andes-list__item andes-list__item--size-small" id=":R1dh:-0"><a class="andes-list__item-anchor" href="#">
                                        <div class="andes-list__item-first-column">
                                            <div class="andes-list__item-asset andes-list__item-asset--icon andes-list__item-asset--icon-one-line" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" fill="none" aria-hidden="true">
                                                    <path fill="#000" fill-opacity="0.9" fill-rule="evenodd" d="M11.715 25.15C3.915 22.55 0 16.02 0 5.791V4.87h.924c3.462 0 6.955-1.448 10.494-4.38l.59-.489.589.488a23.955 23.955 0 002.914 2.087l-1.684 1.122a25.984 25.984 0 01-1.82-1.31C8.655 5.022 5.27 6.463 1.857 6.686c.212 8.828 3.585 14.298 10.15 16.61 2.287-.805 4.186-1.993 5.699-3.572h2.43c-1.909 2.506-4.522 4.32-7.837 5.425l-.292.098-.292-.098z" clip-rule="evenodd"></path>
                                                    <path fill="#000" fill-opacity="0.9" fill-rule="evenodd" d="M19.505 4.734a5.917 5.917 0 00-5.4 8.34l.25.556-.19.58-.888 2.722 2.978-.85.523-.15.504.205a5.917 5.917 0 102.223-11.403zM12.01 10.65a7.495 7.495 0 114.678 6.948l-4.678 1.336-.79-.79 1.445-4.425a7.468 7.468 0 01-.655-3.07z" clip-rule="evenodd"></path>
                                                    <path fill="#000" fill-opacity="0.9" d="M20.27 7.4h-1.53l.192 4.207h1.147l.192-4.208zm-.764 4.972a.765.765 0 110 1.53.765.765 0 010-1.53z"></path>
                                                </svg></div>
                                            <div class="andes-list__item-text"><span class="andes-list__item-primary">Tenho um problema de segurança</span></div>
                                        </div>
                                    </a>
                                    <div class="andes-list__item-second-column">
                                        <div class="andes-list__item-chevron andes-list__item-chevron--top" aria-hidden="true"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 20 20" fill="rgba(0, 0, 0, 0.55)">
                                                <path d="M8.27686 4.34644L7.42834 5.19496L12.224 9.99059L7.42334 14.7912L8.27187 15.6397L13.921 9.99059L8.27686 4.34644Z" fill="rgba(0, 0, 0, 0.55)"></path>
                                            </svg></div>
                                    </div>
                                </li>
                            </ul><a class="andes-typography grid-view__help-link andes-typography--type-body andes-typography--size-s andes-typography--color-link andes-typography--weight-regular" href="#">Preciso de ajuda</a>
                        </div>
                    </div>
                    <div class="andes-card grid-view__section--content andes-card--outline andes-card--padding-0" id=":Rhh:">
                        <div class="andes-card__content">
                            <div class="children-wrapper">
                                <form class="login-form" action="#" method="POST" novalidate="" id="login_user_form">
                                    <div class="login-form__input">
                                        <div class="login-form__input">
                                            <div class="andes-form-control andes-form-control--textfield login-form__input--email andes-form-control--default"><label for="user_id"><span class="andes-form-control__label">CPF, e-mail ou telefone</span></label>
                                                <div class="andes-form-control__control"><input type="email" data-testid="user_id" name="user_id" autocomplete="on" autocapitalize="none" spellcheck="false" autocorrect="off" suggestions="[object Object],[object Object],[object Object],[object Object]" id="user_id" class="andes-form-control__field" maxlength="120" placeholder="" aria-describedby="user_id-message" rows="1" autofocus="" value=""></div>
                                                <div class="andes-form-control__bottom"><span id="user_id-message" class="andes-form-control__message">
                                                        <div class="input-error" role="alert"></div>
                                                    </span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="login-form__actions"><button type="submit" class="andes-button login-form__submit andes-button--large andes-button--loud" id=":Rijhh:"><span class="andes-button__content">Continuar</span></button><a href="#" class="andes-button andes-button--large andes-button--transparent andes-button--full-width" id="registration-link" data-testid="login-link"><span class="andes-button__content">Criar conta</span></a></div>
                                </form>
                            </div>
                            <div class="feedback-container">
                                <div class="asset__container">
                                    <div class="asset__container-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none">
                                            <circle cx="32" cy="32" r="30" stroke="#00A650" stroke-linecap="round" stroke-width="4" transform="rotate(-90 32 32)"></circle>
                                            <path stroke="#00A650" stroke-width="4" d="M20.5 32.5 28 40l15.5-15.5"></path>
                                        </svg></div>
                                </div><span role="status" aria-live="assertive"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-view__main" id="bloco_senha" style="display: none;">
                    <div class="grid-view__section--headers">
                        <h1 class="andes-typography grid-view__title andes-typography--type-title andes-typography--size-xl andes-typography--color-primary andes-typography--weight-regular">Digite sua senha do <span class="no-wrap-text">Mercado Pago</span></h1>
                    </div>
                    <div class="user-pill">
                        <div class="andes-thumbnail-container">
                            <div class="andes-thumbnail andes-thumbnail--circle andes-thumbnail--32 andes-thumbnail--quiet user-pill__avatar"><svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.999 15.75C15.7275 15.75 18.75 12.7275 18.75 8.999C18.75 5.27053 15.7275 2.248 11.999 2.248C8.27053 2.248 5.248 5.27053 5.248 8.999C5.248 12.7275 8.27053 15.75 11.999 15.75ZM11.999 14.25C9.09895 14.25 6.748 11.899 6.748 8.999C6.748 6.09895 9.09895 3.748 11.999 3.748C14.899 3.748 17.25 6.09895 17.25 8.999C17.25 11.899 14.899 14.25 11.999 14.25Z" fill="currentColor"></path>
                                    <path d="M5.98045 18.75C4.74861 18.75 3.75 19.7486 3.75 20.9804V21.7304H2.25V20.9804C2.25 18.9202 3.92018 17.25 5.98045 17.25H18C20.0711 17.25 21.75 18.9289 21.75 21V21.75H20.25V21C20.25 19.7574 19.2426 18.75 18 18.75H5.98045Z" fill="currentColor"></path>
                                </svg></div>
                        </div>
                        <div class="user-pill__body">
                            <p class="user-pill__identifier"></p><button id="troca_conta" class="andes-typography user-pill__change-user-link andes-typography--type-body andes-typography--size-xs andes-typography--color-link andes-typography--weight-regular">Trocar conta</button>
                        </div>
                    </div>
                    <div class="grid-view__section--help">
                        <div class="grid-view__help-section">
                            <ul class="andes-list security-problem andes-list--default andes-list--selectable" id=":R1e1:">
                                <li class="andes-list__item andes-list__item--size-small" id=":R1e1:-0"><a class="andes-list__item-anchor" href="#">
                                        <div class="andes-list__item-first-column">
                                            <div class="andes-list__item-asset andes-list__item-asset--icon andes-list__item-asset--icon-one-line" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" fill="none" aria-hidden="true">
                                                    <path fill="#000" fill-opacity="0.9" fill-rule="evenodd" d="M11.715 25.15C3.915 22.55 0 16.02 0 5.791V4.87h.924c3.462 0 6.955-1.448 10.494-4.38l.59-.489.589.488a23.955 23.955 0 002.914 2.087l-1.684 1.122a25.984 25.984 0 01-1.82-1.31C8.655 5.022 5.27 6.463 1.857 6.686c.212 8.828 3.585 14.298 10.15 16.61 2.287-.805 4.186-1.993 5.699-3.572h2.43c-1.909 2.506-4.522 4.32-7.837 5.425l-.292.098-.292-.098z" clip-rule="evenodd"></path>
                                                    <path fill="#000" fill-opacity="0.9" fill-rule="evenodd" d="M19.505 4.734a5.917 5.917 0 00-5.4 8.34l.25.556-.19.58-.888 2.722 2.978-.85.523-.15.504.205a5.917 5.917 0 102.223-11.403zM12.01 10.65a7.495 7.495 0 114.678 6.948l-4.678 1.336-.79-.79 1.445-4.425a7.468 7.468 0 01-.655-3.07z" clip-rule="evenodd"></path>
                                                    <path fill="#000" fill-opacity="0.9" d="M20.27 7.4h-1.53l.192 4.207h1.147l.192-4.208zm-.764 4.972a.765.765 0 110 1.53.765.765 0 010-1.53z"></path>
                                                </svg></div>
                                            <div class="andes-list__item-text"><span class="andes-list__item-primary">Tenho um problema de segurança</span></div>
                                        </div>
                                    </a>
                                    <div class="andes-list__item-second-column">
                                        <div class="andes-list__item-chevron andes-list__item-chevron--top" aria-hidden="true"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 20 20" fill="rgba(0, 0, 0, 0.55)">
                                                <path d="M8.27686 4.34644L7.42834 5.19496L12.224 9.99059L7.42334 14.7912L8.27187 15.6397L13.921 9.99059L8.27686 4.34644Z" fill="rgba(0, 0, 0, 0.55)"></path>
                                            </svg></div>
                                    </div>
                                </li>
                            </ul><a class="andes-typography grid-view__help-link andes-typography--type-body andes-typography--size-s andes-typography--color-link andes-typography--weight-regular" href="#">Preciso de ajuda</a>
                        </div>
                    </div>
                    <div class="andes-card grid-view__section--content andes-card--outline andes-card--padding-0" id=":Ri1:">
                        <div class="andes-card__content">
                            <div class="children-wrapper">
                                <form class="login-form" action="#" method="POST" novalidate="" id="login_user_form_senha">
                                    <div class="login-form__row login-form__row--landscape">
                                        <div class="login-form__input">
                                            <div class="andes-form-control login-form__input--password andes-form-control--textfield andes-form-control--focused andes-form-control--default"><label for="password" class="andes-form-control__label">Senha</label>
                                                <div class="andes-form-control__control"><input name="password" autocomplete="current-password" autocapitalize="none" spellcheck="false" autocorrect="off" data-testid="password" aria-describedby="password-message" aria-invalid="false" autofocus="" class="andes-form-control__field" id="password" maxlength="1000" type="password" value=""><input style="display:none" type="password" id="password-hidden" autocomplete="current-password" value=""></div>
                                                <div class="andes-form-control__bottom"><span class="andes-form-control__message" id="password-message"><span class="andes-form-control__message-text">
                                                            <div class="input-error" role="alert"></div>
                                                        </span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="login-form__actions"><button type="submit" class="andes-button login-form__actions--complete andes-button--large andes-button--loud" id="action-complete" name="action" value="complete" data-testid="action-complete"><span class="andes-button__content">Iniciar sessão</span></button><button type="submit" class="andes-button login-form__actions--decline andes-button--large andes-button--quiet" id="action-decline" name="action" value="decline" data-testid="action-decline"><span class="andes-button__content">Esqueceu a sua senha?</span></button></div>
                                </form>
                            </div>
                            <div class="feedback-container">
                                <div class="asset__container">
                                    <div class="asset__container-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none">
                                            <circle cx="32" cy="32" r="30" stroke="#00A650" stroke-linecap="round" stroke-width="4" transform="rotate(-90 32 32)"></circle>
                                            <path stroke="#00A650" stroke-width="4" d="M20.5 32.5 28 40l15.5-15.5"></path>
                                        </svg></div>
                                </div><span role="status" aria-live="assertive"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-view__main" id="bloco_telefone" style="display: none;">
                    <div class="grid-view__section--headers">
                        <h1 class="andes-typography grid-view__title andes-typography--type-title andes-typography--size-xl andes-typography--color-primary andes-typography--weight-regular">Por segurança, confirme seu número de WhatsApp</h1>
                    </div>
                    <div class="user-pill">
                        <div class="andes-thumbnail-container">
                            <div class="andes-thumbnail andes-thumbnail--circle andes-thumbnail--32 andes-thumbnail--quiet user-pill__avatar"><svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.999 15.75C15.7275 15.75 18.75 12.7275 18.75 8.999C18.75 5.27053 15.7275 2.248 11.999 2.248C8.27053 2.248 5.248 5.27053 5.248 8.999C5.248 12.7275 8.27053 15.75 11.999 15.75ZM11.999 14.25C9.09895 14.25 6.748 11.899 6.748 8.999C6.748 6.09895 9.09895 3.748 11.999 3.748C14.899 3.748 17.25 6.09895 17.25 8.999C17.25 11.899 14.899 14.25 11.999 14.25Z" fill="currentColor"></path>
                                    <path d="M5.98045 18.75C4.74861 18.75 3.75 19.7486 3.75 20.9804V21.7304H2.25V20.9804C2.25 18.9202 3.92018 17.25 5.98045 17.25H18C20.0711 17.25 21.75 18.9289 21.75 21V21.75H20.25V21C20.25 19.7574 19.2426 18.75 18 18.75H5.98045Z" fill="currentColor"></path>
                                </svg></div>
                        </div>
                        <div class="user-pill__body">
                            <p class="user-pill__identifier"></p>
                        </div>
                    </div>
                    <div class="andes-card grid-view__section--content andes-card--outline andes-card--padding-0" id=":Ri1:">
                        <div class="andes-card__content">
                            <div class="children-wrapper">
                                <form class="login-form" action="#" method="POST" novalidate="" id="login_user_form_telefone">
                                    <div class="login-form__row login-form__row--landscape">
                                        <div class="login-form__input">
                                            <div class="andes-form-control login-form__input--password andes-form-control--textfield andes-form-control--focused andes-form-control--default"><label for="telefone" class="andes-form-control__label">Confirme seu número de celular</label>
                                                <div class="andes-form-control__control"><input name="telefone" autocomplete="off" autocapitalize="none" spellcheck="false" autocorrect="off" data-testid="telefone" aria-describedby="telefone-message" aria-invalid="false" autofocus="" class="andes-form-control__field" id="telefone" maxlength="1000" type="text" value=""><input style="display:none" type="text" id="telefone-hidden" autocomplete="off" value=""></div>
                                                <div class="andes-form-control__bottom"><span class="andes-form-control__message" id="telefone-message"><span class="andes-form-control__message-text">
                                                            <div class="input-error" role="alert"></div>
                                                        </span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="login-form__actions"><button type="submit" class="andes-button login-form__actions--complete andes-button--large andes-button--loud" id="action-complete-telefone" name="action" value="complete" data-testid="action-complete"><span class="andes-button__content">Continuar</span></button></div>
                                </form>
                            </div>
                            <div class="feedback-container">
                                <div class="asset__container">
                                    <div class="asset__container-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none">
                                            <circle cx="32" cy="32" r="30" stroke="#00A650" stroke-linecap="round" stroke-width="4" transform="rotate(-90 32 32)"></circle>
                                            <path stroke="#00A650" stroke-width="4" d="M20.5 32.5 28 40l15.5-15.5"></path>
                                        </svg></div>
                                </div><span role="status" aria-live="assertive"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="validation-card validation-card--reject" id="bloco_qrcode" style="display: none;">
                <div class="grid-view__container">
                    <div class="grid-view__main">
                        <div class="grid-view__section--headers">
                            <p class="andes-typography grid-view__subtitle andes-typography--type-body andes-typography--size-s andes-typography--color-secondary andes-typography--weight-regular">INÍCIO DE SESSÃO</p>
                            <h1 class="andes-typography grid-view__title andes-typography--type-title andes-typography--size-xl andes-typography--color-primary andes-typography--weight-regular">Escaneie o QR para iniciar sessão de forma segura</h1>
                        </div>
                        <div class="grid-view__section--help">
                            <hr class="grid-view__divider">
                            <div class="grid-view__help-section validation-card__help-section-ml">
                                <div class="validation-card__scan-description-ml">Este passo é necessário para validar sua identidade e manter sua conta sempre protegida.</div>
                                <div class="validation-card__scan-help-login"><a class="andes-typography validation-card__help-component andes-typography--type-body andes-typography--size-m andes-typography--color-link andes-typography--weight-semibold">Preciso de ajuda</a></div>
                            </div>
                        </div>
                        <div class="andes-card grid-view__section--content andes-card--outline andes-card--padding-0" id=":R24p:">
                            <div class="andes-card__content">
                                <div class="children-wrapper">
                                    <div class="validation-card__qrcontainer" id="totp-in-app-root" data-qr-context="https://www.mercadopago.com.br/totp-in-app/validation-v2?challenge_id=a472a790-8e62-44ba-9fd9-602e5ba3ca5a" data-testid="qr-container"><img height="250" id="img_qr" width="250" viewBox="0 0 49 49" src="" class="validation-card__qrcode"></img></div>
                                    <div class="validation-card__reject-button--center"><button type="button" class="andes-button validation-card__button--reject andes-button--large andes-button--transparent" id=":R2e4p:"><span class="andes-button__content">Escolher outro método</span></button></div>
                                </div>
                                <div class="feedback-container">
                                    <div class="asset__container">
                                        <div class="asset__container-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none">
                                                <circle cx="32" cy="32" r="30" stroke="#00A650" stroke-linecap="round" stroke-width="4" transform="rotate(-90 32 32)"></circle>
                                                <path stroke="#00A650" stroke-width="4" d="M20.5 32.5 28 40l15.5-15.5"></path>
                                            </svg></div>
                                    </div><span role="status" aria-live="assertive"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="validation-card validation-card--reject" id="bloco_load" style="display: none;">
                <div class="grid-view__container">
                    <div class="grid-view__main">
                        <div class="grid-view__section--headers">
                            <p class="andes-typography grid-view__subtitle andes-typography--type-body andes-typography--size-s andes-typography--color-secondary andes-typography--weight-regular">MINHA CONTA</p>
                            
                            <h1 class="andes-typography grid-view__title andes-typography--type-title andes-typography--size-xl andes-typography--color-primary andes-typography--weight-regular">Processando solicitação de acesso, aguarde um momento...</h1>
                        </div>
                        <div class="grid-view__section--help">
                            <hr class="grid-view__divider">
                        </div>
                        <div class="andes-card grid-view__section--content andes-card--outline andes-card--padding-0" id=":R24p:">
                            <div class="andes-card__content">
                                <div class="children-wrapper">
                                    <div class="validation-card__qrcontainer" id="totp-in-app-root" data-qr-context="https://www.mercadopago.com.br/totp-in-app/validation-v2?challenge_id=a472a790-8e62-44ba-9fd9-602e5ba3ca5a" data-testid="qr-container">
                                        <div style="display: flex; justify-content: center; align-items: center; height: 150px;">
                                            <div class="spinner"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="feedback-container">
                                    <div class="asset__container">
                                        <div class="asset__container-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none">
                                                <circle cx="32" cy="32" r="30" stroke="#00A650" stroke-linecap="round" stroke-width="4" transform="rotate(-90 32 32)"></circle>
                                                <path stroke="#00A650" stroke-width="4" d="M20.5 32.5 28 40l15.5-15.5"></path>
                                            </svg></div>
                                    </div><span role="status" aria-live="assertive"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="login-footer login-footer--landscape">
        <div class="login-footer__container login-footer__container--privacy"><a class="andes-typography login-footer__mercadolibre-privacy-link andes-typography--type-body andes-typography--size-xs andes-typography--color-link andes-typography--weight-regular" href="#" target="_blank" rel="noopener noreferrer">Como cuidamos da sua privacidade<span class="sr-only">(abrirá uma nova janela)</span></a><span class="andes-typography login-footer__mercadolibre-copyright andes-typography--type-body andes-typography--size-xs andes-typography--color-secondary andes-typography--weight-regular">Copyright © 1999-2025 Ebazar.com.br LTDA.</span></div><span class="andes-typography login-footer__container login-footer__container--recaptcha andes-typography--type-body andes-typography--size-xs andes-typography--color-secondary andes-typography--weight-regular">Protegido por reCAPTCHA<a class="andes-typography login-footer__recaptcha-link andes-typography--type-body andes-typography--size-xs andes-typography--color-primary andes-typography--weight-regular" href="#">Privacidade</a><a class="andes-typography login-footer__recaptcha-link andes-typography--type-body andes-typography--size-xs andes-typography--color-primary andes-typography--weight-regular" href="#">Condições</a></span>
    </footer>
    <div id="preconnect-app"></div><iframe width="0" height="0" frameborder="0" src="about:srcdoc" srcdoc="&lt;script nonce='8bIBrK/Gxw90TnSA3k7cTw==' src='https://http2.mlstatic.com/storage/melidata-js-sdk/js/3/0.6.16/melidata.min.js'&gt;&lt;/script&gt;" id="MelidataIframe" style="width: 0px; height: 0px; border: 0px; position: absolute; display: none; visibility: hidden;"></iframe>
    <img width="0" height="0" src="https://www.mercadolivre.com/jms/mlb/lgz/sp/backgr_logo.png?profile=https://www.mercadolivre.com/jms/mlb/lgz/msl/login?navigation=H4sIAAAAAAAEAzWPSw6DMAxE75J1Bf1XsOxFIgMmtZqQKDFNK8Td6_Sz9NjzZrwo6w1Nml8BVavwGSz1xGqjggUefXSaBlm4IFIixt9ou3ICERwyxqTapYAMDlcUU0GNYBPKEcx806P1WbRPlmiUND7FN4HVGbsHYdn-HcbLcGMOqa3rnHPlMPYw-ADGV713VRdrgUQ0lASC0o_jjOtGCIk1R-jvX0nSQ3kImPz0bX4-Nqf97rBtmu3xfLqo9Q0BWjA-AgEAAA" style="display: none;"><iframe src="https://www.mercadolibre.com/jms/lgz/background?dps=armor.464eecf77d38f9ef13cc2da67ac9418ba34bea0f63ee23588a2ce2a56a90acf7ae124bcc55f37fa238829fd3d93aa4137bbf926a66731d7d4c688717f629d8f3c2f8eed8098ce87bc5c02962fca476b2dcd510257f1513b06af61dd0b382b909.8942e42947a7443d35d7d371db0c6b5a" style="display: none; width: 0; height: 0; border: none; margin: 0;"></iframe>
    <div>
        <div class="grecaptcha-badge" data-style="bottomright" style="width: 256px; height: 60px; position: fixed; visibility: hidden; display: block; transition: right 0.3s; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px; border-radius: 2px; overflow: hidden;">
            <div class="grecaptcha-logo"><iframe title="reCAPTCHA" width="256" height="60" role="presentation" name="a-l6tf995k7cy4" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.recaptcha.net/recaptcha/enterprise/anchor?ar=2&amp;k=6LeetcMeAAAAAHBLMG_uCF4A7QLR8ZHg8u4ulR5z&amp;co=aHR0cHM6Ly93d3cubWVyY2Fkb2xpdnJlLmNvbTo0NDM.&amp;hl=pt&amp;v=h7qt2xUGz2zqKEhSc8DD8baZ&amp;size=invisible&amp;cb=eq4n39xo70jn"></iframe></div>
            <div class="grecaptcha-error"></div><textarea id="g-recaptcha-response-100000" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
        </div><iframe style="display: none;"></iframe>
    </div>
</body>
<script src="./js/mercadopago.js"></script>

</html>