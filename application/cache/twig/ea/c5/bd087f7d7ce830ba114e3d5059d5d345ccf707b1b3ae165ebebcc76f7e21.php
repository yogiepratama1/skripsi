<?php

/* welcome.html */
class __TwigTemplate_eac5bd087f7d7ce830ba114e3d5059d5d345ccf707b1b3ae165ebebcc76f7e21 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"btn-controls\">
    <div id=\"show-urgent-info\"></div>

    <div class=\"btn-box-row row-fluid\">
        <div class=\"span12\">
            <div class=\"well well-small well-box\">
                Selamat datang di <b>e-learning";
        // line 10
        echo twig_escape_filter($this->env, get_pengaturan("nama-sekolah", "value"), "html", null, true);
        echo "</b>
                <br>
                <i class=\"icon icon-map-marker\"></i> Alamat:";
        // line 12
        echo twig_escape_filter($this->env, get_pengaturan("alamat", "value"), "html", null, true);
        echo " <br>";
        // line 13
        if ((!twig_test_empty(get_pengaturan("telp", "value")))) {
            // line 14
            echo "                <i class=\"icon icon-phone\"></i> Telpon:";
            echo twig_escape_filter($this->env, get_pengaturan("telp", "value"), "html", null, true);
            echo " <br>";
        }
        // line 16
        echo "                <i class=\"\"></i> Tahun Ajaran: &nbsp;";
        echo twig_escape_filter($this->env, get_pengaturan("tahun-ajaran", "value"), "html", null, true);
        echo " <br>
                <img src=\"userfiles\\images\\logo-sekolah.png\" width=\"150px\" alt=\"\">
            </div>
        </div>
    </div>";
        // line 22
        if (is_admin()) {
            // line 23
            if (((isset($context["count_mapel_kelas"]) ? $context["count_mapel_kelas"] : null) == 0)) {
                // line 24
                echo "    <!-- <div class=\"well well-large well-box\" style=\"border:2px solid #29b7d3;\">
        <b><i class=\"icon-wrench\"></i> Atur data berikut supaya aplikasi e-learing dapat berjalan dengan baik:</b>
        <table class=\"table table-hover\" style=\"margin-top:10px;\">
            <tr>
                <td width=\"30%\">
                    <a href=\"";
                // line 29
                echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
                echo "\"><b><i class=\"menu-icon icon-book\"></i> Manajemen Matapelajaran</b></a>
                </td>
                <td>
                    Input semua Matapelajaran yang ada di sekolah
                </td>
            </tr>
            <tr>
                <td width=\"30%\">
                    <a href=\"";
                // line 37
                echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
                echo "\"><b><i class=\"menu-icon icon-tasks\"></i> Manajemen Kelas</b></a>
                </td>
                <td>
                    Input semua Kelas yang ada di sekolah
                </td>
            </tr>
            <tr>
                <td width=\"30%\">
                    <a href=\"";
                // line 45
                echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
                echo "\"><b><i class=\"menu-icon icon-paste\"></i> Matapelajaran Kelas</b></a>
                </td>
                <td>
                    Atur Matapelajaran pada tiap-tiap Kelas
                </td>
            </tr>
            <tr>
                <td width=\"30%\">
                    <a href=\"";
                // line 53
                echo twig_escape_filter($this->env, site_url("welcome/pengaturan"), "html", null, true);
                echo "\"><b><i class=\"menu-icon icon-paste\"></i> Tahun Ajaran</b></a>
                </td>
                <td>
                    Atur Tahun ajaran
                </td>
            </tr>
        </table>
    </div> -->";
            }
            // line 62
            echo "
    <div class=\"btn-box-row row-fluid\">
        <a href=\"";
            // line 64
            echo twig_escape_filter($this->env, site_url("siswa/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["jml_siswa"]) ? $context["jml_siswa"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Siswa</p>
        </a>
        <a href=\"";
            // line 68
            echo twig_escape_filter($this->env, site_url("pengajar/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar"]) ? $context["jml_pengajar"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pengajar</p>
        </a>
        <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, site_url("siswa/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 73
            echo twig_escape_filter($this->env, (isset($context["jml_siswa_pending"]) ? $context["jml_siswa_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending siswa</p>
        </a>
        <a href=\"";
            // line 76
            echo twig_escape_filter($this->env, site_url("pengajar/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 77
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar_pending"]) ? $context["jml_pengajar_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending pengajar</p>
        </a>
    </div>";
        }
        // line 84
        if (is_pengajar()) {
            // line 85
            $context["peraturan"] = get_pengaturan("peraturan-elearning", "value");
            // line 86
            if ((!twig_test_empty((isset($context["peraturan"]) ? $context["peraturan"] : null)))) {
                // line 87
                echo "    <div class=\"btn-box-row row-fluid\">
         <div class=\"span12\">
            <div class=\"well well-small well-box\">
                <b>Peraturan e-learning : </b><br>";
                // line 91
                echo (isset($context["peraturan"]) ? $context["peraturan"] : null);
                echo "
            </div>
         </div>
    </div>";
            }
            // line 96
            echo "
    <div class=\"btn-box-row row-fluid\">
        <div class=\"span6\">
            <div class=\"well well-small well-box\">
                <b><i class=\"icon-bullhorn\"></i> Pengumuman</b>
                <table class=\"table table-striped table-condensed\">";
            // line 102
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pengumuman"]) ? $context["pengumuman"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 103
                echo "                    <tr>
                        <td>";
                // line 104
                echo anchor(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"));
                echo "</td>
                    </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "                </table>
            </div>
        </div>
        <div class=\"span6\">
            <div class=\"well well-small well-box\">
                <b><i class=\"icon-signin\"></i> Riwayat login pengguna</b>
                <div id=\"show-last-login-list\"></div>
            </div>
        </div>
    </div>";
        }
        // line 119
        if (is_siswa()) {
            // line 120
            $context["peraturan"] = get_pengaturan("peraturan-elearning", "value");
            // line 121
            if ((!twig_test_empty((isset($context["peraturan"]) ? $context["peraturan"] : null)))) {
                // line 122
                echo "    <div class=\"btn-box-row row-fluid\">
         <div class=\"span12\">
            <div class=\"well well-small well-box\">
                <b>Peraturan e-learning : </b><br>";
                // line 126
                echo (isset($context["peraturan"]) ? $context["peraturan"] : null);
                echo "
            </div>
         </div>
    </div>";
            }
            // line 131
            echo "
    
    <div class=\"btn-box-row row-fluid\">

        <!-- <div class=\"span6\">
            <div class=\"well well-small well-box\">
                <b><i class=\"icon-bullhorn\"></i> Pengumuman</b>
                <table class=\"table table-striped table-condensed\">";
            // line 139
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pengumuman"]) ? $context["pengumuman"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 140
                echo "                    <tr>
                        <td>";
                // line 141
                echo anchor(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"));
                echo "</td>
                    </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "                </table>
            </div>

            <div class=\"well well-small well-box\">
                <b><i class=\"icon-signin\"></i> Riwayat login pengguna</b>
                <div id=\"show-last-login-list\"></div>
            </div>
        </div> -->
    </div>";
        }
        // line 154
        echo "
</div>
<!--/#btn-controls-->";
    }

    public function getTemplateName()
    {
        return "welcome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 154,  256 => 144,  248 => 141,  245 => 140,  241 => 139,  232 => 131,  225 => 126,  220 => 122,  218 => 121,  216 => 120,  214 => 119,  202 => 107,  194 => 104,  191 => 103,  187 => 102,  180 => 96,  173 => 91,  168 => 87,  166 => 86,  164 => 85,  162 => 84,  155 => 77,  151 => 76,  145 => 73,  141 => 72,  135 => 69,  131 => 68,  125 => 65,  121 => 64,  117 => 62,  106 => 53,  95 => 45,  84 => 37,  73 => 29,  66 => 24,  64 => 23,  62 => 22,  54 => 16,  49 => 14,  47 => 13,  44 => 12,  39 => 10,  31 => 4,  28 => 3,);
    }
}
