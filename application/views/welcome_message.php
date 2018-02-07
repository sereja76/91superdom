<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 
  <?
  
  /*echo $title;
  if ($this->ion_auth->logged_in() || $this->ion_auth->is_admin())
    {
      echo "авторизован юзер или админ - ".$this->session->userdata('identity');
    }
    else {
      echo "не авторизован";
    }
    
    
    if ($this->ion_auth->is_admin())
    {
      echo "авторизован админ - ".$this->session->userdata('identity');
    }
    
    echo "<pre>";
    print_r ($this->session->userdata());
    echo "</pre>"; */
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MPU</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="libs/reset.css">
  <link rel="stylesheet" href="libs/fullPage/jquery.fullpage.min.css">
  <link rel="stylesheet" type="text/css" href="libs/slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="css/main.min.css">

</head>
<body>

  <!-- Полоса загрузки страниц -->
  <div class="load-line"></div>

  <!-- Меню -->
  <header class="top-header">
    <a href="#" class="logo"></a>
    <div class="top-header__inner clearfix">
      <ul id="mainMenu" class="main-menu">
        <li class="main-menu__li main-menu__li_active"><a href="#s1" data-anchor="s1"  class="main-menu__link">Hauptseite</a></li>
        <li class="main-menu__li"><a href="#s2" data-anchor="s2"  class="main-menu__link">Statistiken</a><a href="#">.</a><a href="#">.</a></li>
        <li class="main-menu__li"><a href="#s3" data-anchor="s3"  class="main-menu__link">Angebot</a></li>
        <li class="main-menu__li"><a href="#s4" data-anchor="s4"  class="main-menu__link">Über uns</a></li>
        <li class="main-menu__li"><a href="#s5" data-anchor="s5"  class="main-menu__link">Ihre Vorteile</a></li>
        <li class="main-menu__li"><a href="#s6" data-anchor="s6"  class="main-menu__link">Ablauf</a></li>
        <li class="main-menu__li"><a href="#s7" data-anchor="s7"  class="main-menu__link">Pläne</a></li>
        <li class="main-menu__li"><a href="#s8" data-anchor="s8"  class="main-menu__link">Kostenlos<br>ausprobieren</a></li>
        <li class="main-menu__li"><a href="#s9" data-anchor="s9"  class="main-menu__link">Bewertungen</a></li>
        <li class="main-menu__li"><a href="#s10" data-anchor="s10" class="main-menu__link">Kontakte</a></li>
      </ul>
    </div>
    <div class="menu-button-block">
      <div id="menuButton" class="menu__button"></div>
      <div class="menu__title">MENU</div>
    </div>
  </header>

  <!-- Ссылки логина и регистрации -->
  <div class="login">
    <div class="login__wr">

      <? if (!$this->ion_auth->logged_in())
      {
        echo "<a href='auth/login' class='login__cont log'>Login</a>
              <span class='login__cont'>or</span>
              <a href='auth/create_user' class='login__cont reg'>Register</a>";
      }
      else {
        echo "<a href='lk/index' class='login__cont log'>Personal account</a>";
      }
      ?>

    </div>
  </div>


            
  
    
    


  <!-- Блок скролла -->
  <div class="scroll">
    <div id="scrollIndex" class="scroll__index scroll__index_start">01</div>
    <div class="scroll__title">scroll</div>
    <div class="scroll__index scroll__index_end">10</div>
  </div>

  <!-- основное содержание страницы со слайдами-->
  <div id="main" class="main">
    
    <div class="section active page home">
      <div class="page__inner page__inner_1">
        <h2 class="h2">MPU Zertifizierung</h2>
        <p class="descr page__descr">Zweites Standbein für Ihre Fahrschule</p>
        <p class="note page__note">Jetzt Module sbschließen und zertifizierter MPU Berater werden.</p>
        <button class="button button__video" id="watch_video">watch the video</button>
        <div class="prompt">los geht's</div>
      </div>
    </div>

    <div class="section page stat">
      <div class="page__inner">
        <h2 class="h2 h2_white"><span class="h2__small">ca.</span>100.000</h2>
        <p class="descr page__descr descr_white">Gutachten jährlich in Deutschland</p>
        
        <div class="statistic clearfix">
          <div class="statistic__graph">
            <div class="bar bar_1">
              <div class="bar__icon bar__icon_1"></div>
              <div class="bar__height bar__height_1"></div>
              <div class="bar__value">30%</div>
            </div>
            <div class="bar bar_2">
              <div class="bar__icon bar__icon_2"></div>
              <div class="bar__height bar__height_2"></div>
              <div class="bar__value bar__value_black">24%</div>
            </div>
            <div class="bar bar_3">
              <div class="bar__icon bar__icon_3"></div>
              <div class="bar__height bar__height_3"></div>
              <div class="bar__value">17%</div>
            </div>
            <div class="bar bar_4">
              <div class="bar__icon bar__icon_4"></div>
              <div class="bar__height bar__height_4"></div>
              <div class="bar__value">12%</div>
            </div>
            <div class="bar bar_5">
              <div class="bar__icon bar__icon_5"></div>
              <div class="bar__height bar__height_5"></div>
              <div class="bar__value">11%</div>
            </div>
            <div class="bar bar_6">
              <div class="bar__icon bar__icon_6"></div>
              <div class="bar__height bar__height_6"></div>
              <div class="bar__value">5%</div>
            </div>
            <div class="bar bar_7">
              <div class="bar__icon bar__icon_7"></div>
              <div class="bar__height bar__height_7"></div>
              <div class="bar__value"></div>
            </div>   
          </div>  
          
          <div class="statistic__list">
            <p class="statistic__text statistic__text_1">Alcohol erstmalige Auffälligket (30%)</p>
            <p class="statistic__text statistic__text_2">Drogen & Medikamente (24%)</p>
            <p class="statistic__text statistic__text_3">Verkehrsauffällige ohne Alkohol (17%)</p>
            <p class="statistic__text statistic__text_4">Alcohol wiederholte Auffälligket (12%)</p>
            <p class="statistic__text statistic__text_5">Sonstige Anlässe (11%)</p>
            <p class="statistic__text statistic__text_6">Alkohol & Verkehrs- oder strafrechtliche Delikte (5%) </p>
            <p class="statistic__text statistic__text_7">Körperliche Mängel (1%)</p>
          </div>
          
        </div>

        <h2 class="h2 h2_white stat__h2"></span>CA. 90%</h2>
        <p class="descr page__descr descr_white page__descr_stat">Dutchfallquote ohne Vorbereitung</p>
        <div class="big-bar">
          <p class="big-bar__value">90%</p>
          <div class="big-bar__progress"></div>
        </div>  

      </div>
    </div>

    <div class="section page angebot">
      <div class="page__inner">
            <div class="angebot__wr">
          <div class="angebot__col angebot__col_1">
            <div class="angebot__item angebot__item_1">
              <p class="angebot__text angebot__text_1">Wenig Kunden?</p>
              <p class="angebot__text angebot__text_2">Hohe Mietkosten?</p>
              <p class="angebot__text angebot__text_long">Bedarf nach weiterem Leistungsangebot?</p>
            </div>
          </div>
          <div class="angebot__col angebot__col_2">
            <div class="angebot__item angebot__item_blue">
              <div class="angebot__title">Werden Sie ein qualifizierter MPU Berater</div>   
              <div class="angebot__note">mit Berechtigung auf Zertifikaterteilung Ber</div>
            </div>
            <a href="#s7" class="button angebot__button">Berater werden</a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="section page uber-uns">
      <div class="page__inner">
        <h2 class="h2 uber-uns__h2">über Uns</h2>
        <div class="uber-uns__content">
          <div class="uber-uns__col">
            <p class="uber-uns__text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
            <p class="uber-uns__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
          </div>
          <div class="uber-uns__img">
            <img src="img/images/about_us.jpg" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="section page vorteile">
      <div class="page__inner">
        <h2 class="h2 vorteile__h2">Ihre Vorteile</h2>
        <div class="vorteile__container">
          <div class="vorteile__col">
            <p class="vorteile__item vorteile__item_people">Größerer Kundenstamm</p>  
            <p class="vorteile__item vorteile__item_money">Weitere Einkünfte / Leistungen</p>  
            <p class="vorteile__item vorteile__item_list">Schulungsmöglichkeiten online und offline</p>  
          </div>
          <div class="vorteile__col">
            <p class="vorteile__item vorteile__item_star">Stärkung Ihres Fahrschulrufes / Namens</p>  
            <p class="vorteile__item vorteile__item_hat">Relevantes Wissen für Sie als Spezialist</p>  
          </div>
        </div>
      </div>
    </div>


    <div class="section page ablauf">
      <div class="page__inner">
        <h2 class="h2 ablauf__h2">Ablauf</h2>
        <div class="vorteile__container">
          <div class="vorteile__col">
            <p class="vorteile__item ablauf__bag"><a href="lk/promo" class="link-pdf">Nur 5 Lernmodule (Video/ Audio/ PDF)</a></p>  
            <p class="vorteile__item ablauf__list">Interaktiver Test nach jedem Modulabschluss</p>  
            <p class="vorteile__item ablauf__like">Angenehme und verständliche Informationvermittlung </p>  
          </div>
          <div class="vorteile__col">
            <p class="vorteile__item ablauf__person">Persönliche Unterstützung von unseren Experten</p>  
            <p class="vorteile__item ablauf__day">Bereits nach 1 Tag erfolgreiche Zertifizierung möglich</p>  
          </div>
        </div>
      </div>
    </div>


    <div class="section page plane">
      <div class="page__inner">
        <h2 class="h2 plane__h2">Alle investierte Mittel sind bereits nach Ihrem ersten Kunden wieder beglichen</h2>
        <p class="plane__descr">denn in der Regel kostet MPU Vorbereitung ca. 1500 EUR</p>
        

        <? 
        //$data['part_continue'] = '1'; 
        //echo $this->load->view('user/price_list');
        ?>
        
        <div class="plane__container">
          
          <div class="plane__item">
            <div class="plane__cont">
              <p class="plane__price">479 €</p>   
              <p class="plane__name">ECONOM</p>
              <a href="#" class="plane__more">MORE ></a>
              <p class="plane__punkt plane__punkt_check">Доступ к Видеоматериалу о <a href="#" class="plane__link">четырех модулях MPU</a></p> 
              <p class="plane__punkt plane__punkt_check"><a href="#" class="plane__link">PDF материал</a>, для скачивания</p> 
              <p class="plane__punkt plane__punkt_check"><a href="#" class="plane__link">АУДИО-материалы</a> для скачивания</p> 
              <p class="plane__punkt plane__punkt_check">Online-семинар на тему как и где искать клиентов</p> 
            </div>
            <div class="plane__buy">
              <a href="buy/buy_tariff/one/1" class="plane__order">Заказать</a>
            </div>
          </div>

          <div class="plane__item plane__item_active">
            <div class="plane__cont">
              <p class="plane__price">679 €</p>   
              <a href="#" class="plane__more">MORE ></a>
              <p class="plane__name plane__name_1">STANDART</p>
              <p class="plane__punkt plane__punkt_check plane__punkt_addition">Все позиции из пакета ECONOM</p>
              <p class="plane__addition">Дополнительно:</p>
              <p class="plane__punkt plane__punkt_plus">Online семинар на тему всех о тонкостях подготовки к MPU</p> 
              <p class="plane__punkt plane__punkt_plus">Online или телефонный семинар, помощь при подготовке к MPU первого клиента</p> 
            </div>
            <div class="plane__buy">
              <a href="buy/buy_tariff/two/1" class="plane__order">Заказать</a>
            </div>
          </div>
          
          <div class="plane__item">
            <div class="plane__cont">
              <p class="plane__price">879 €</p> 
              <a href="#" class="plane__more">MORE ></a>  
              <p class="plane__name plane__name_1">VIP</p>
              <p class="plane__punkt plane__punkt_check plane__punkt_addition">Все позиции из пакетов ECONOM & STANDART</p>
              <p class="plane__addition">Дополнительно:</p>
              <p class="plane__punkt plane__punkt_plus">Полное сопровождение при подготовке вашего первого клиента и ваше детальное обучение подготовки к MPU на примере клиента.</p> 
            </div>
            <div class="plane__buy">
              <a href="buy/buy_tariff/three/1" class="plane__order">Заказать</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>


    <div class="section page trial">
      <div class="page__inner">
        <h2 class="h2 trial__h2">Jetzt ersten Modul „Einführung“</h2>
        <p class="descr trial__descr">KOSTENLOS abschließen</p>
        <form class="trial__form" action="lk/promo" method="post"> 
          <input type="email" name="email" class="trial__input" placeholder="Yor email">
          <input type="submit" name="submit" class="submit trial__submit" value="Jetzt loslegen">
          <a href="lk/privacy_policy" target="blank" class="link-privacy trial__link-privacy">Our Privacy Policy</a>
        </form>

      </div>
    </div>

    <div class="section page reviews">
      <div class="page__inner">
        <h2 class="h2 reviews__h2">What client say</h2>
        <div class="reviews__container clearfix">
          
          <div class="reviews__item">
            <p class="reviews__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
            <div class="reviews__sign">
              <div class="reviews__author">— John Doe</div>
              <div class="reviews__conpany">Founder of UknownCompany</div>
            </div>
          </div>

          <div class="reviews__item">
            <p class="reviews__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
            <div class="reviews__sign">
              <div class="reviews__author">— John Doe</div>
              <div class="reviews__conpany">Founder of UknownCompany</div>
            </div>
          </div>
          
          <div class="reviews__item">
            <p class="reviews__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
            <div class="reviews__sign">
              <div class="reviews__author">— John Doe</div>
              <div class="reviews__conpany">Founder of UknownCompany</div>
            </div>
          </div>

          <div class="reviews__item">
            <p class="reviews__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
            <div class="reviews__sign">
              <div class="reviews__author">— John Doe</div>
              <div class="reviews__conpany">Founder of UknownCompany</div>
            </div>
          </div>

          <div class="reviews__item">
            <p class="reviews__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
            <div class="reviews__sign">
              <div class="reviews__author">— John Doe</div>
              <div class="reviews__conpany">Founder of UknownCompany</div>
            </div>
          </div>

          <div class="reviews__item">
            <p class="reviews__text">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore.</p>
            <div class="reviews__sign">
              <div class="reviews__author">— John Doe</div>
              <div class="reviews__conpany">Founder of UknownCompany</div>
            </div>
          </div>

        </div>

      </div>
    </div>


    <div class="section page contact">
      <div class="page__inner">
        <h2 class="h2 contact__h2">Kontakt Daten</h2>
        <form class="contact__form" action="lk/mail_to_adm" method="post"> 
          <div class="form-col form-col_1">
            <label class="contact__label" for="name">What is your name?
            <input class="contact__input" type="text" id="name" name="name" class="contact__input" placeholder="Yor name"></label>
            
            <label class="contact__label" for="email_1">Where to answer?
              <input class="contact__input" type="email" id="email_1" name="email_1" class="contact__input" placeholder="Yor email">
            </label>
            
          </div>
          <div class="form-col form-col_2">
            <label class="contact__label" for="message">Message:</label>
            <textarea class="contact__textarea" name="message" id="message" placeholder="Hello, I want to ask..."></textarea>
            <input class="submit contact__submit" type="submit" name="submit" value="Jetzt loslegen">
            <a href="lk/privacy_policy" target="blank" class="link-privacy contact__link-privacy">Our Privacy Policy</a>
          </div>
        </form>

      </div>
    </div>


  </div>

  

  <footer class="footer">
    <div class="footer__wr clearfix">
      <div class="footer__item">
        <p class="footer__title">Email:</p>
        <a href="mailto:siivanov@yandex.ru" class="footer_link">siivanov@yandex.ru</a>
      </div>    
      <div class="footer__item">
        <p class="footer__title">Anschrift:</p>
        <p class="footer_link">Company City — 65301, Random St. 89</p>
      </div>
      <div class="footer__item">
        <p class="footer__title">Telefon:</p>
        <a class="footer_link" href="tel:5593301786">559-330-1786</a>
      </div>
    </div>
  </footer>


  <div id="modal_form"><!-- Сaмo oкнo --> 
      <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть --> 
      <!-- Тут любoе сoдержимoе -->
      <iframe width="560" height="315" src="https://www.youtube.com/embed/myPUc0vaYZ8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

  </div>
  <div id="overlay"></div><!-- Пoдлoжкa -->

  <script src="libs/jquery-3.2.1.min.js"></script>
  <script src="libs/fullPage/jquery.fullpage.min.js"></script>
  <script src="libs/slick/slick.min.js"></script>
  <script src="js/common.js"></script>

</body>
</html>