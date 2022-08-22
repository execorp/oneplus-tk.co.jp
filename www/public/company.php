<?php
require_once './securimage/securimage.php';
$securimage = new Securimage();
$captcha_code = '';
$style_mail = '';


if (!empty($_POST['captcha_code']) AND !empty($_POST['title']) AND !empty($_POST['toiawase'])) {
    $check = $securimage->check($_POST['captcha_code']);
    if (!empty($check)) {
        $mail_html = '<div class="c-sec__lyt">
                        <div class="c-tbl r-type01 r-secondary is-fixed r-type-form">
                            <table>
                                <colgroup>
                                    <col class="u-wd22per--pc">
                                    <col class="u-wd78per--pc">
                                </colgroup>
                                <tbody>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">メールアドレス<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textbox">
                                            '.$_POST['title'].'
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">
                                        <div class="c-tbl__head__c">お問い合わせ内容<br class="u-none--sp"><span
                                                    class="c-form__icn--require">必須</span></div></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textarea">
                                        '.nl2br($_POST['toiawase']).'
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>';
        $mail_button = '<div class="c-btn-list r-center01 r-1line u-mt-m">
                    <input type="hidden" name="type" value="confirm">
                    <input type="hidden" name="title" value="'.$_POST['title'].'">
                    <input type="hidden" name="toiawase" value="'.nl2br($_POST['toiawase']).'">
                    <p style="color: red; text-align: center; padding-top: 15px; font-size: 13px">※上記の内容で問題ない場合、送信ボタンを押してください</p>
                    <div class="c-btn-list__itm" style="">
                        <input type="submit" class="c-btn-list__itm__link r-emphasis" value="送信">
                    </div>
                </div>';
    } else {
        $captcha_code = '※画像認証エラー';
        $mail_html = '<div class="c-sec__lyt">
                        <div class="c-tbl r-type01 r-secondary is-fixed r-type-form">
                            <table>
                                <colgroup>
                                    <col class="u-wd22per--pc">
                                    <col class="u-wd78per--pc">
                                </colgroup>
                                <tbody>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">メールアドレス<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textbox">
                                            <input type="email" id="title" placeholder="メールアドレスを入力してください。" class="u-wd100per"
                                                   name="title" value="'.$_POST['title'].'">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">
                                        <div class="c-tbl__head__c">お問い合わせ内容<br class="u-none--sp"><span
                                                    class="c-form__icn--require">必須</span></div></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textarea">
                                        <textarea name="toiawase"
                                                  placeholder="お問い合わせの内容をご入力ください。">'.nl2br($_POST['toiawase']).'</textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">画像認証<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <p><img id="captcha" src="securimage/securimage_show.php" alt="captcha">
                                            <button type="button" id="button" style="border: 0; background-color: #fff;">
                                                <img src="securimage/images/refresh.png" alt="" class="header-help">
                                            </button>
                                        </p>
                                        <p><input type="text" name="captcha_code" class="captcha_code"
                                                  placeholder="表示されている文字を入力してください" style="border: 1px solid red;"></p>
                                        <p style="color: red">'.$captcha_code.'</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>';
        $mail_button = '<div class="c-btn-list r-center01 r-1line u-mt-m">
                    <input type="hidden" name="type" value="send">
                    <div class="c-btn-list__itm" style="">
                       <input type="submit" class="c-btn-list__itm__link r-emphasis" value="入力内容の確認">
                    </div>
                </div>';
    }
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['title'])) {
        $captcha_code = '';
        $mail_html = '<div class="c-sec__lyt">
                        <div class="c-tbl r-type01 r-secondary is-fixed r-type-form">
                            <table>
                                <colgroup>
                                    <col class="u-wd22per--pc">
                                    <col class="u-wd78per--pc">
                                </colgroup>
                                <tbody>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">メールアドレス<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textbox">
                                            <input type="email" id="title" placeholder="メールアドレスを入力してください。" class="u-wd100per"
                                                   name="title" value="'.$_POST['title'].'" style="border: 1px solid red;">
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">
                                        <div class="c-tbl__head__c">お問い合わせ内容<br class="u-none--sp"><span
                                                    class="c-form__icn--require">必須</span></div></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textarea">
                                        <textarea name="toiawase"
                                                  placeholder="お問い合わせの内容をご入力ください。">'.nl2br($_POST['toiawase']).'</textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">画像認証<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <p><img id="captcha" src="securimage/securimage_show.php" alt="captcha">
                                            <button type="button" id="button" style="border: 0; background-color: #fff;">
                                                <img src="securimage/images/refresh.png" alt="" class="header-help">
                                            </button>
                                        </p>
                                        <p><input type="text" name="captcha_code" class="captcha_code"
                                                  placeholder="表示されている文字を入力してください"></p>
                                        <p style="color: red">'.$captcha_code.'</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>';
        $mail_button = '<div class="c-btn-list r-center01 r-1line u-mt-m">
                    <input type="hidden" name="type" value="send">
                    <p style="color: red; text-align: center; padding-top: 15px; font-size: 13px">※メールアドレスを正しく入力してください</p>
                    <div class="c-btn-list__itm" style="">
                       <input type="submit" class="c-btn-list__itm__link r-emphasis" value="入力内容の確認">
                    </div>
                </div>';
    }
} else {
    if (empty($_POST['captcha_code']) AND !empty($_POST['type'])) $style_captcha_code = ' style="border: 1px solid red;"';
    if (empty($_POST['title']) AND !empty($_POST['type'])) $style_title = ' style="border: 1px solid red;"';
    if (empty($_POST['toiawase']) AND !empty($_POST['type'])) $style_toiawase = ' style="border: 1px solid red;"';
    $mail_html = '<div class="c-sec__lyt">
                        <div class="c-tbl r-type01 r-secondary is-fixed r-type-form">
                            <table>
                                <colgroup>
                                    <col class="u-wd22per--pc">
                                    <col class="u-wd78per--pc">
                                </colgroup>
                                <tbody>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">メールアドレス<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textbox">
                                            <input type="email" id="title" placeholder="メールアドレスを入力してください。" class="u-wd100per"
                                                   name="title" value="'.$_POST['title'].'"'.$style_title.' required>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">
                                        <div class="c-tbl__head__c">お問い合わせ内容<br class="u-none--sp"><span
                                                    class="c-form__icn--require">必須</span></div></th>
                                    <td class="c-tbl__data">
                                        <div class="c-form-textarea">
                                        <textarea name="toiawase" placeholder="お問い合わせの内容をご入力ください。"'.$style_toiawase.' required
                                            >'.nl2br($_POST['toiawase']).'</textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="c-tbl__row">
                                    <th class="c-tbl__head">画像認証<br class="u-none--sp"><span
                                                class="c-form__icn--require">必須</span></th>
                                    <td class="c-tbl__data">
                                        <p><img id="captcha" src="securimage/securimage_show.php" alt="captcha">
                                            <button type="button" id="button" style="border: 0; background-color: #fff;">
                                                <img src="securimage/images/refresh.png" alt="" class="header-help">
                                            </button>
                                        </p>
                                        <p><input type="text" name="captcha_code" class="captcha_code"
                                                  placeholder="表示されている文字を入力してください"'.$style_captcha_code.' required></p>
                                        <p><?php echo $captcha_code ?></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>';
    $mail_button = '<div class="c-btn-list r-center01 r-1line u-mt-m">
                    <input type="hidden" name="type" value="send">
                    <div class="c-btn-list__itm" style="">
                        <input type="submit" class="c-btn-list__itm__link r-emphasis" value="入力内容の確認">
                    </div>
                </div>';
}
if ($_POST['type'] == 'confirm'){
    $mail_html = '<div class="c-sec__lyt"><div class="c-tbl r-type01 r-secondary is-fixed r-type-form" style="text-align: center; font-size: 25px;">メール送信完了</div></div>';
    $mail_button = '';

    $to = 'mikuni@execute.jp';
    $subject = 'お問い合わせ内容';

    $_POST['toiawase'] = str_replace('<br />', '',$_POST['toiawase']);
    $message = $_POST['toiawase'];
    $headers = 'From: ' . $_POST['title'];

    $subject = mb_encode_mimeheader($subject);
    $message = mb_convert_encoding($message, 'UTF-8');
    $headers = mb_convert_encoding($headers, 'UTF-8');

    mb_internal_encoding("UTF-8");

    mail($to, $subject, $message, $headers);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>

    <meta name="robots" content="noindex">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <!--  SEO  -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>One Plus</title>
    <!-- favicon -->
    <link rel="icon" href="/favicon.ico">
    <!-- FONTS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&family=Noto+Sans+JP:wght@400;700;900&family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
    <!--  CSS  -->
    <link rel="stylesheet" href="./css/reset.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/slick.css">
    <link rel="stylesheet" href="./css/mail.css">
    <!--  JQUERY  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/common.js"></script>
</head>

<body>

	<header>
		<div class="header_inner flex">
			<h1 class="flex">
				<a href="index.html"><img src="img/headlogo.png" width="200"></a>
			</h1>
			<button id="spMenu">
			  <span></span>
			  <span></span>
			  <span></span>
			</button>
			<nav id="header_nav">
				<ul class="flex">
					<li><a href="index.html" class="">HOME</a></li>
					<li><a href="#profile">会社案内</a></li>
					<li><a href="#about">取扱製品一覧</a></li>
					<li><a href="#mail">お問い合わせ</a></li>
				</ul>
			</nav>
		</div>
	</header>

<main>
    <section id="about"<?php echo $style_mail ?>>
        <div class="section_inner">
            <img src="img/cover_companyPC.png" alt="会社説明" class="pc_only">
            <img src="img/cover_companySP.png" alt="会社説明" class="sp_only">
            <h2>事業案内</h2>
            <p>3つの事業を主軸として活動しています</p>
        </div>
    </section>

    <section id="trade" class="service_contents"<?php echo $style_mail ?>>
        <div class="section_inner">
            <img src="img/trade.png" alt="国際貿易">
            <h3>国際貿易</h3>
            <ul>
                <li>取り扱いジャンル（美容品等）</li>
                <li>発注フロー</li>
                <li>梱包</li>
                <li>保税</li>
                <li>仕分け</li>
            </ul>
            <p class="service_contents_txt">
                海外企業との輸出・輸入代行を行っています。<br>
                企業様向けの輸出業務の引き受け、必要書類の代行申請など多岐の対応が可能です。<br>
                海外での必要な手順や金額についてもお気軽にご相談ください。
            </p>
            <div class="slanting" style="font-size: 0; fill: #ba151c;">
                　　<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none" style="">
                    <polygon points="0,10 100,10 50,0"></polygon>
                    　　</svg>
            </div>
            <div class="genre">
                <p>
                    取り扱いジャンル
                    <span>取り扱いジャンルの説明</span>
                </p>
                <dl class="flex">
                    <dt>発注フロー</dt>
                    <dd>
                        お客様からご依頼があった場合、商品の選定を行い価格を決定し、必要な輸出入の書類作成を行い現地と取引を成立させます。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>保税</dt>
                    <dd>
                        輸出の許可を受けた貨物を一時的に置くことができる保税地域内の倉庫で、貨物の搬出入などの管理運用を行っています。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>梱包</dt>
                    <dd>
                        一般的なケース梱包から特殊梱包まで幅広く行っています。
                    </dd>
                </dl>
            </div>
        </div>
    </section>

    <section id="estate" class="service_contents"<?php echo $style_mail ?>>
        <div class="section_inner">
            <img src="img/estate.png" alt="不動産">
            <h3>不動産</h3>
            <ul>
                <li>売買（戸建、マンション、土地）</li>
                <li>借りる（賃貸）リノベーション</li>
                <li>投資</li>
                <li>トラブル</li>
            </ul>
            <p class="service_contents_txt">
                1戸建て住宅やマンション、アパート、土地等の賃貸や売買を仲介する、<br>
                または賃貸や売買希望の不動産を探し、依頼物件の価格や紹介を行っています。
            </p>
            <div class="slanting" style="font-size: 0; fill: #ba151c;">
                　　<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none" style="">
                    <polygon points="0,10 100,10 50,0"></polygon>
                    　　</svg>
            </div>
            <div class="genre">
                <dl class="flex">
                    <dt>買う</dt>
                    <dd>
                        1戸建て、マンション、土地、投資用不動産について買う場合、取引の流れ、相場、住環境、予算についての情報提供やご相談、不動産の持ち主、借主への取引の仲介を行います。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>売る</dt>
                    <dd>
                        物件価格の査定、希望する媒介契約を結び売り出した後に購入、希望者と交渉を仲介します。<br>
                        契約にはご希望の価格や代金の支払い条件、引き渡し希望日など、必要な情報のご相談や書面の作成の仲介を行います。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>借りる</dt>
                    <dd>
                        入居の申し込みを行った後に審査をし、賃貸借契約を結びます。<br>
                        その際には賃借物件や契約条件に関する重要事項の説明を行います。<br>
                        ご不明点があればその場で確認してください。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>投資</dt>
                    <dd>
                        不動産投資は副収入として家賃を得ることができます。<br>
                        人気の投資方法です。しかし、大きなお金や知識が必要なため、これから不動産投資を始めるお客様に対して探し方・選び方、リスク回避方法などをサポートしています。
                    </dd>
                </dl>
            </div>
        </div>
    </section>

    <section id="travel" class="service_contents"<?php echo $style_mail ?>>
        <div class="section_inner">
            <img src="img/travel.png" alt="旅行業">
            <h3>旅行業</h3>
            <ul>
                <li>登録内容</li>
                <li>渡航情報</li>
                <li>ビザ</li>
                <li>パスポート</li>
                <li>補助金</li>
            </ul>
            <p class="service_contents_txt">
                旅行者のために、運送、宿泊に関するサービスをご提供します。<br>
                また、旅行に付随する運送等サービス及び運送関連等サービスを提供するものと代理で
                契約を取次する事業も行っています。
            </p>
            <div class="slanting" style="font-size: 0; fill: #ba151c;">
                　　<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none" style="">
                    <polygon points="0,10 100,10 50,0"></polygon>
                    　　</svg>
            </div>
            <div class="genre">
                <dl class="flex">
                    <dt>登録内容</dt>
                    <dd>
                        我々旅行業を行う物は観光庁長官又は都道府県知事による業者の登録を受けています。<br>
                        →登録内容（登録種類、登録番号等）
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>渡航情報</dt>
                    <dd>
                        海外の主な観光地の他に、安全を確保するために<a href="https://www.anzen.mofa.go.jp/">外務省海外安全ホームページ</a>や<a href="https://www.mofa.go.jp/mofaj/link/zaigai/index.html">日本大使館のホームページ</a>から渡航先の情報をしっかりと収集しましょう。<br>
                        また、新型コロナウイルスや特有の病気に対する情報も持ち、自分の身を守りましょう。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>ビザ</dt>
                    <dd>
                        各国への渡航の場合、滞在日数によって手続きが異なりますのでご確認ください。<br>
                        <a href="https://www.mofa.go.jp/mofaj/toko/visa/index.html#visa1">→各国の情報</a>
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>パスポート</dt>
                    <dd>
                        海外でパスポートを紛失し新たな旅券や新しいパスポートを発行するにはいくつかの書類と手続きが必要です。<a href="https://www.mofa.go.jp/mofaj/toko/passport/pass_4.html#q26">こちら</a>のページでご確認ください。
                    </dd>
                </dl>
                <dl class="flex">
                    <dt>補助金に<br>ついて</dt>
                    <dd>
                        国や各都道府県では海外旅行に対して、経費を補助するための制度がいくつかあります。<br>
                        ご自身の都道府県のホームページや観光庁のホームページを見て利用できる制度がないかチェックしてください。
                    </dd>
                </dl>
            </div>
        </div>
    </section>

    <section id="profile"<?php echo $style_mail ?>>
        <div class="section_inner">
            <h2>会社概要</h2>
            <dl class="flex">
                <dt class="flex">会社名</dt>
                <dd>株式会社 OnePlus</dd>
                <dt class="flex">代表</dt>
                <dd>　</dd>
                <dt class="flex">事務所</dt>
                <dd>〒121-0816 東京都足立区梅島1-32-6 203号</dd>
                <dt class="flex">倉庫</dt>
                <dd>〒344-0032 埼玉県春日部市備後東5-12-48</dd>
                <dt class="flex">TEL</dt>
                <dd>03-5817-4203</dd>
                <dt class="flex">FAX</dt>
                <dd>03-5817-4204</dd>
                <dt class="flex">事業内容</dt>
                <dd>国際貿易、不動産、旅行業</dd>
                <dt class="flex">定休日</dt>
                <dd>　</dd>
                <dt class="flex">LINE</dt>
                <dd>　</dd>
                <dt class="flex">運営サイト</dt>
                <dd><a href="">https://</a></dd>
            </dl>
        </div>
    </section>

    <section id="mail">
        <div class="container">
            <form method="post" id="the-form" action="#mail">
                <div class="c-sec c-sec-maxinner">
                    <h2 class="c-hdg--lv2">お問い合わせ</h2>
                    <?php echo $mail_html ?>
                </div>
                <?php echo $mail_button ?>

                <input type="hidden" name="captcha_style" value="">
            </form>
        </div>
    </section>

    <section id="access"<?php echo $style_mail ?>>
        <div class="section_inner">
            <div class="info flex">
                <img src="img/logo.png" width="200" height="80" class="pc_only">
                <p>
                    本社<br>
                    〒121-0816 東京都足立区梅島1-32-6 203号<br>
                    TEL:03-5817-4203　FAX:03-5817-4204<br>
                </p>
                <p>
                    物流倉庫<br>
                    〒344-0032 埼玉県春日部市備後東5-12-48
                </p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.0361687405957!2d139.7973533154676!3d35.77448788017271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601891d8c32595cf%3A0x501dd1dc7469b899!2z44CSMTIxLTA4MTYg5p2x5Lqs6YO96Laz56uL5Yy65qKF5bO277yR5LiB55uu77yT77yS4oiS77yW!5e0!3m2!1sja!2sjp!4v1658214115284!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>

<footer>
    <nav id="footer_nav">
        <ul class="flex">
            <li><a href="index.html">HOME</a></li>
            <li><a href="#profile">会社案内</a></li>
            <li><a href="#about">取扱製品一覧</a></li>
            <li><a href="#mail">お問い合わせ</a></li>
            <li><a href="./privacy.html">プライバシーポリシー</a></li>
        </ul>
    </nav>
    <p id="copyright">Copyright(C) <a href="#">株式会社 ワンプラス</a> All Rights Reserved.</p>
    <p id="pageTop"<?php echo $style_mail ?>><i class="fa-solid fa-chevron-up"></i></p>
</footer>
</body>
</html>
