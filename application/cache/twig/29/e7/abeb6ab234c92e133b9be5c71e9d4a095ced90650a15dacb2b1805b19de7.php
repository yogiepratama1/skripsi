<?php

/* detail-materi.html */
class __TwigTemplate_29e7abeb6ab234c92e133b9be5c71e9d4a095ced90650a15dacb2b1805b19de7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-detail-materi.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-detail-materi.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo " -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <h1 class=\"title\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo "</h1>";
        // line 11
        if ((!array_key_exists("error", $context))) {
            // line 12
            echo "        <ul class=\"unstyled inline ul-top\">
            <li><b>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b>,</li>";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 15
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo ",</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "            <li>Diposting oleh <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a></li>
            <li>";
            // line 18
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "tgl_posting")), "html", null, true);
            echo ",</li>
            <li>";
            // line 19
            echo ((((isset($context["type"]) ? $context["type"] : null) == "tertulis")) ? ("Dibaca") : ("Diunduh"));
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "views"), "html", null, true);
            echo " Kali</li>
            <li>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "jml_komentar"), "html", null, true);
            echo " Komentar</li>
        </ul>";
        }
        // line 23
        echo "
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">";
        // line 27
        if ((!array_key_exists("error", $context))) {
            // line 28
            if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
                // line 29
                echo $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten");
            } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
                // line 31
                echo "                        <dl class=\"dl-horizontal\">
                            <!-- <dt>Name</dt>
                            <dd>";
                // line 33
                echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"))) ? ("noname") : ($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"))), "html", null, true);
                echo "</dd>
                            <dt>Size</dt>
                            <dd>";
                // line 35
                echo twig_escape_filter($this->env, byte_format($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "size")), "html", null, true);
                echo "</dd>
                            <dt>Modified</dt>
                            <dd>";
                // line 37
                echo twig_escape_filter($this->env, tgl_jam_indo(mdate("%Y-%m-%d %H:%i:%s", $this->getAttribute((isset($context["materifile_info"]) ? $context["materifile_info"] : null), "date"))), "html", null, true);
                echo "</dd>
                            <dt>Mime</dt>
                            <dd>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "mime"), "html", null, true);
                echo "</dd> -->
                            <dt></dt>
                            <dd><br><a href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "download_link"), "html", null, true);
                echo "\" class=\"btn btn-warning\"><i class=\"icon-download\"></i> Download File Materi</a></dd>
                        </dl>";
            }
            // line 44
            echo "
                    <br>
                    <div class=\"row-fluid\">
                        <div class=\"span8\">
                            <div class=\"bg-form-komentar\" id=\"form-komentar\">
                                <!-- <form method=\"post\" action=\"";
            // line 49
            echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id"))), "html", null, true);
            echo "\">
                                    <p><textarea class=\"span12 \" id=\"komentar\" name=\"komentar\">";
            // line 50
            echo set_value("komentar");
            echo "</textarea></p>
                                    <p>
                                        <button class=\"btn btn-primary pull-right\">Post komentar</button>
                                        <img src=\"";
            // line 53
            echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
            echo "\" style=\"height:30px;width:30px; margin-right:5px;\" class=\"img-circle img-polaroid\">";
            // line 54
            echo twig_escape_filter($this->env, get_sess_data("user", "nama"), "html", null, true);
            echo "
                                    </p>
                                    <div class=\"clear\"></div>
                                </form> -->";
            // line 58
            if ((isset($context["show_presensi_form"]) ? $context["show_presensi_form"] : null)) {
                // line 59
                echo "                                <form method=\"post\" action=\"";
                echo twig_escape_filter($this->env, site_url(("materi/presensi/" . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id"))), "html", null, true);
                echo "\">
                                    <label>
                                        <input type=\"radio\" name=\"absen\" value=\"hadir\"> Hadir
                                    </label>
                                    <label>
                                        <input type=\"radio\" name=\"absen\" value=\"izin\"> Izin
                                    </label>
                                    <label>
                                        <input type=\"radio\" name=\"absen\" value=\"sakit\"> Sakit
                                    </label>
                                    <button type=\"submit\">Submit</button>
                                </form>";
            } else {
                // line 72
                echo "                                Kamu sudah melakukan presensi.";
            }
            // line 74
            echo "                            
                            </div>
                            <br>";
            // line 78
            if (($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "jml_komentar") > 0)) {
                // line 79
                echo "                                <h4><i class=\"icon-comments\"></i>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "jml_komentar"), "html", null, true);
                echo " Komentar</h4>";
                // line 81
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "komentar"));
                foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                    // line 82
                    echo "                                <div class=\"komentar\" id=\"komentar-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
                    echo "\">
                                    <img src=\"";
                    // line 83
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_image"), "html", null, true);
                    echo "\" style=\"height:25px;width:25px; margin-left:5px;\" class=\"img-circle img-polaroid pull-right\">
                                    <p><a href=\"";
                    // line 84
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_profil"), "html", null, true);
                    echo "\"><b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "nama"), "html", null, true);
                    echo "</b></a>, <small>";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "tgl_posting"), "d F Y"), "html", null, true);
                    echo "</small>, <small><a href=\"";
                    echo twig_escape_filter($this->env, site_url(((("materi/detail/" . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id")) . "/laporkan/") . $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"))), "html", null, true);
                    echo "\" class=\"text-muted iframe-laporkan\"><i class=\"icon-bug\"></i> laporkan</a></small></p>";
                    // line 85
                    echo $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "konten");
                    echo "
                                </div>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 88
                echo "
                                <div style=\"font-size:12px;\">";
                // line 90
                echo $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "komentar_pagination");
                echo "
                                </div>";
            }
            // line 93
            echo "                        </div>
                        <div class=\"span4\">
                            <h4><i class=\"icon-file\"></i> Materi lainnya</h4>
                            <ul class=\"unstyled ul-materi\">";
            // line 97
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["terkait"]) ? $context["terkait"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 98
                echo "                                <li>
                                    <div class=\"materi\">
                                        <a href=\"";
                // line 100
                echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"";
                echo ((twig_test_empty($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "file"))) ? ("icon-file") : ("icon-download"));
                echo " img-circle img-polaroid";
                echo (((strlen($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "judul")) > 33)) ? ("pull-left") : (""));
                echo "\" style=\"padding:10px; margin-right:10px;\"></i>";
                echo $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "judul");
                echo "</a>
                                    </div>
                                </li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            if (twig_test_empty((isset($context["terkait"]) ? $context["terkait"] : null))) {
                // line 106
                echo "                                <div class=\"alert alert-info\">Tidak ada materi terkait</div>";
            }
            // line 108
            echo "                            </ul>
                        </div>
                    </div>";
        } else {
            // line 113
            echo "                    <div class=\"alert alert-danger\">
                        <h3>";
            // line 114
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</h3>
                    </div>";
        }
        // line 117
        echo "            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "detail-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 117,  266 => 114,  263 => 113,  258 => 108,  255 => 106,  253 => 105,  238 => 100,  234 => 98,  230 => 97,  225 => 93,  220 => 90,  217 => 88,  209 => 85,  200 => 84,  196 => 83,  191 => 82,  187 => 81,  183 => 79,  181 => 78,  177 => 74,  174 => 72,  158 => 59,  156 => 58,  150 => 54,  147 => 53,  141 => 50,  137 => 49,  130 => 44,  125 => 41,  120 => 39,  115 => 37,  110 => 35,  105 => 33,  101 => 31,  98 => 29,  96 => 28,  94 => 27,  89 => 23,  84 => 20,  79 => 19,  75 => 18,  68 => 17,  60 => 15,  56 => 14,  53 => 13,  50 => 12,  48 => 11,  45 => 10,  41 => 8,  38 => 7,  32 => 4,  29 => 3,);
    }
}
