<?php get_header(); ?>

    <div class="content-main">

        <div class="content">
            <div class="intro_panel">
                <div id="description">
                    <span> Платформа, выполняющая роль информатора,контролера и мессенджера</span>
                </div>
                <div id="quote_block">
                    <span id="quote">
                        "Посвятить жизнь бизнесу, который строит мосты между людьми."
                    </span>
                    <span id=""quote_author">
                        ДЭНИЕЛ ЛЮБЕЦКИ,<br>ОСНОВАТЕЛЬ КОМПАНИИ KIND
                    </span>
                    <input type="button" id="begin_work" value="Начать работу" onclick="start()">
                    <script>
                        function start() {
                            var results = document.cookie.match ( '(^|;) ?' + "user_id" + '=([^;]*)(;|$)' );

                            if ( results )
                            {
                                var results = document.cookie.match ( '(^|;) ?' + "role" + '=([^;]*)(;|$)' );
                                alert(results);
                            }
                            else
                            {
                                location.replace(<?php home_url()."/registration"?>)
                            }
                        }
                    </script>       
                </div>
            </div>

        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>