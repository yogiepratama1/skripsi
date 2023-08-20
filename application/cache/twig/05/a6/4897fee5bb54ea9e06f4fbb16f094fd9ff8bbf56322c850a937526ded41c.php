<?php

/* ujian-online.html */
class __TwigTemplate_05a64897fee5bb54ea9e06f4fbb16f094fd9ff8bbf56322c850a937526ded41c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-ujian.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-ujian.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo " -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span9\">
                <h1 class=\"title\">";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"span3\">
                <ul class=\"unstyled inline pull-right user-info\">
                    <li><b>";
        // line 16
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "</b></li>
                    <li><img src=\"";
        // line 17
        echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid img-circle\" /></li>
                </ul>
            </div>
        </div>
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                <div class=\"row-fluid\">";
        // line 25
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 26
            echo "                    <div class=\"span8\">
                        <b>Informasi : </b><br>";
            // line 28
            echo $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info");
            echo "
                    </div>
                    <div class=\"span4\">
                        <div class=\"pull-right clock\" data-spy=\"affix\" data-offset-top=\"60\" data-offset-bottom=\"200\">
                            <div class=\"box-show-hide-countdown\">";
            // line 33
            $context["hide_countdown"] = sess_hide_countdown("get", $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"));
            // line 34
            if (((isset($context["hide_countdown"]) ? $context["hide_countdown"] : null) == 1)) {
                // line 35
                echo "                                    <a href=\"javascript:void(0)\" onclick=\"show_countdown()\" class=\"text-muted\"><i class=\"icon icon-eye-open\"></i> TAMPILKAN TIMER</a>";
            } else {
                // line 37
                echo "                                    <a href=\"javascript:void(0)\" onclick=\"hide_countdown()\" class=\"text-muted\"><i class=\"icon icon-eye-close\"></i> SEMBUNYIKAN TIMER</a>";
            }
            // line 39
            echo "                            </div>
                            <div class=\"iosl-theme-wrapper countdown\"";
            // line 40
            echo ((((isset($context["hide_countdown"]) ? $context["hide_countdown"] : null) == 1)) ? ("style=\"display:none;\"") : (""));
            echo ">
                                <div class=\"iosl-theme\">
                                    <ul>
                                        <li><p><span><em><b class=\"hours\">00</b><i class=\"hoursSlider\"><u>00</u><u>00</u></i></em></span></p></li>
                                        <li><p><span><em><b class=\"minutes\">00</b><i class=\"minutesSlider\"><u>00</u><u>00</u></i></em></span></p></li>
                                        <li><p><span><em><b class=\"seconds\">00</b><i class=\"secondsSlider\"><u>00</u><u>00</u></i></em></span></p></li>
                                    </ul>
                                    <div class=\"jC-clear\"></div>
                                    <p class=\"jCtext\">
                                        <span><em class=\"textSeconds\">SECONDS</em></span>
                                        <span><em class=\"textMinutes\">MINUTES</em></span>
                                        <span><em class=\"textHours\">HOURS</em></span>
                                    </p>
                                    <div class=\"jC-clear\"></div>
                                </div>
                            </div>
                        </div>
                    </div>";
        } else {
            // line 59
            echo "                    <div class=\"span6\">
                        <p><b>Upload file tugas anda : </b></p>
                        <div class=\"well well-sm\">";
            // line 62
            echo form_open_multipart(((("tugas/submit_upload/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                            <input type=\"file\" name=\"userfile\">
                            <hr class=\"hr1\">
                            <div class=\"row-fluid\">
                                <div class=\"span3\">
                                    <button type=\"submit\" class=\"btn btn-primary\">Upload</button>
                                </div>
                                <div class=\"span9\">";
            // line 70
            echo get_flashdata("upload");
            echo "
                                </div>
                            </div>
                            <br>
                            <p><button type=\"submit\" name=\"cancel\" value=\"1\" class=\"btn btn-default\">&larr; Kembali</button></p>";
            // line 75
            echo form_close();
            echo "
                        </div>
                    </div>
                    <div class=\"span6\">
                        <b>Informasi Tugas : </b><br>";
            // line 80
            echo $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info");
            echo "
                    </div>";
        }
        // line 83
        echo "                </div>";
        // line 85
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) {
            // line 86
            echo "                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Pertanyaan";
            // line 90
            echo ((($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) ? (" dan Pilihan") : (""));
            echo "</th>
                            </tr>
                        </thead>
                        <tbody>";
            // line 94
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 95
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">";
                // line 99
                echo $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan");
                echo "
                                    </div>

                                    <div id=\"pilihan-";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                        <table class=\"table table-condensed table-striped\">
                                            <tbody>";
                // line 105
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    if ((!twig_test_empty($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")))) {
                        // line 106
                        echo "                                                <tr>
                                                    <td width=\"5%\"><label class=\"label-radio\"><input";
                        // line 107
                        echo ((is_pilih($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"))) ? ("checked") : (""));
                        echo " type=\"radio\" name=\"pilihan-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                        echo "\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan"), "html", null, true);
                        echo "\" onclick=\"update_ganda(";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
                        echo ",";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                        echo ",";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"), "html", null, true);
                        echo ")\" class=\"radio\">";
                        echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                        echo "</label></td>
                                                    <td>";
                        // line 109
                        echo $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten");
                        echo "
                                                    </td>
                                                </tr>";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 113
                echo "                                            </tbody>
                                        </table>
                                    </div>

                                </td>
                            </tr>";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "                        </tbody>
                    </table>

                    <div class=\"well well-sm\">
                        <p class=\"p-info\">Periksa kembali jawaban anda sebelum mengahiri pengerjaan tugas ini.</p>
                        <button type=\"button\" class=\"btn btn-large btn-primary\" data-toggle=\"modal\" data-target=\"#selesai-mengerjakan\">
                            Selesai Mengerjakan
                        </button>
                    </div>

                    <div class=\"modal fade\" id=\"selesai-mengerjakan\" tabindex=\"-1\" role=\"dialog\">
                        <div class=\"modal-dialog\" role=\"document\">
                            <div class=\"modal-content\">
                                <div class=\"modal-body\">
                                    Anda yakin ingin mengahiri pengerjaan tugas ini?
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Nanti dulu</button>
                                    <a class=\"btn btn-primary\" href=\"";
            // line 139
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\" id=\"btn-submit\">Ya, saya sudah selesai</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        // line 147
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 2)) {
            // line 148
            echo form_open(((("tugas/submit_essay/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")), array("id" => "form-essay"));
            echo "
                    <input type=\"hidden\" id=\"str_id\" value=\"";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "str_id"), "html", null, true);
            echo "\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Pertanyaan";
            // line 154
            echo ((($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) ? (" dan Pilihan") : (""));
            echo "</th>
                            </tr>
                        </thead>
                        <tbody>";
            // line 158
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 159
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 160
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">";
                // line 163
                echo $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan");
                echo "
                                    </div>

                                    <textarea name=\"jawaban[";
                // line 166
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "]\" id=\"jawaban-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\" class=\"\">";
                echo get_jawaban($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"));
                echo "</textarea>

                                </td>
                            </tr>";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 172
            echo "                        </tbody>
                    </table>

                    <div class=\"well well-sm\">
                        <p class=\"p-info\">Periksa kembali jawaban anda sebelum mengahiri pengerjaan tugas ini.</p>
                        <button type=\"button\" class=\"btn btn-large btn-primary\" data-toggle=\"modal\" data-target=\"#selesai-mengerjakan\">
                            Selesai Mengerjakan
                        </button>
                    </div>";
            // line 181
            echo form_close();
            echo "

                    <div class=\"modal fade\" id=\"selesai-mengerjakan\" tabindex=\"-1\" role=\"dialog\">
                        <div class=\"modal-dialog\" role=\"document\">
                            <div class=\"modal-content\">
                                <div class=\"modal-body\">
                                    Anda yakin ingin mengahiri pengerjaan tugas ini?
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Nanti dulu</button>
                                    <button type=\"button\" class=\"btn btn-primary\" id=\"btn-submit\">Ya, saya sudah selesai</button>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        // line 197
        echo "
            </div>
        </div>
    </div>
</div>";
        // line 202
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 203
            echo "<input type=\"hidden\" id=\"process-submit\" value=\"0\">
<input type=\"hidden\" id=\"tugas_id\" value=\"";
            // line 204
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"type_id\" value=\"";
            // line 205
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"sisa_menit\" value=\"";
            // line 206
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "sisa_menit"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"finish_url\" value=\"";
            // line 207
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"siswa_id\" value=\"";
            // line 208
            echo twig_escape_filter($this->env, get_sess_data("user", "id"), "html", null, true);
            echo "\">";
        }
    }

    public function getTemplateName()
    {
        return "ujian-online.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  412 => 208,  408 => 207,  404 => 206,  400 => 205,  396 => 204,  393 => 203,  391 => 202,  385 => 197,  367 => 181,  357 => 172,  335 => 166,  329 => 163,  324 => 160,  319 => 159,  302 => 158,  296 => 154,  288 => 149,  284 => 148,  282 => 147,  274 => 139,  254 => 121,  235 => 113,  225 => 109,  209 => 107,  206 => 106,  201 => 105,  196 => 102,  190 => 99,  185 => 96,  180 => 95,  163 => 94,  157 => 90,  151 => 86,  149 => 85,  147 => 83,  142 => 80,  135 => 75,  128 => 70,  118 => 62,  114 => 59,  93 => 40,  90 => 39,  87 => 37,  84 => 35,  82 => 34,  80 => 33,  73 => 28,  70 => 26,  68 => 25,  58 => 17,  54 => 16,  47 => 12,  41 => 8,  38 => 7,  32 => 4,  29 => 3,);
    }
}
