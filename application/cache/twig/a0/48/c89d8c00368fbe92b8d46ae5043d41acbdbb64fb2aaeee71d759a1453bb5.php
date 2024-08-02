<?php

/* register.html */
class __TwigTemplate_a048c89d8c00368fbe92b8d46ae5043d41acbdbb64fb2aaeee71d759a1453bb5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-public.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-public.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Register -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    <div class=\"module span8 offset2\">
            <div class=\"module-head\">
                <h3>Register E-learning</h3>
            </div>

            <div class=\"module-body\">";
        // line 15
        echo get_flashdata("register");
        // line 17
        if ((!twig_test_empty(get_pengaturan("info-registrasi", "value")))) {
            // line 18
            echo "                <div class=\"well well-small\" style=\"box-shadow: none;\">
                    <b>Informasi : </b><br>";
            // line 20
            echo get_pengaturan("info-registrasi", "value");
            echo "
                </div>";
        }
        // line 23
        echo "
                <ul class=\"nav nav-tabs\">";
        // line 25
        if ((get_pengaturan("registrasi-siswa", "value") == 1)) {
            // line 26
            echo "                    <li";
            echo ((((isset($context["sebagai"]) ? $context["sebagai"] : null) == "siswa")) ? ("class=\"active\"") : (""));
            echo "><a href=\"#register-siswa\" data-toggle=\"tab\">Sebagai siswa</a></li>";
        }
        // line 29
        if ((get_pengaturan("registrasi-pengajar", "value") == 1)) {
            // line 30
            echo "                    <li";
            echo ((((isset($context["sebagai"]) ? $context["sebagai"] : null) == "pengajar")) ? ("class=\"active\"") : (""));
            echo "><a href=\"#register-pengajar\" data-toggle=\"tab\">Sebagai pengajar</a></li>";
        }
        // line 32
        echo "                </ul>

                <div class=\"tab-content\">";
        // line 35
        if ((get_pengaturan("registrasi-siswa", "value") == 1)) {
            // line 36
            echo "                    <div class=\"tab-pane fade";
            echo ((((isset($context["sebagai"]) ? $context["sebagai"] : null) == "siswa")) ? ("active") : (""));
            echo " in\" id=\"register-siswa\">";
            // line 37
            echo form_open_multipart("login/register/siswa", array("class" => "form-horizontal row-fluid"));
            echo "
                        <!-- <p>Jika mendaftar sebagai orang tua maka email wajib seperti ini orangtua_(namasiswa)@gmail.com. NIS dikosongkan</p> -->
                            <div class=\"control-group\">
                                <label class=\"control-label\">NIS</label>
                                <div class=\"controls\">
                                    <input type=\"text\" id=\"nis\" name=\"nis\" class=\"span4\" value=\"";
            // line 42
            echo twig_escape_filter($this->env, set_value("nis"), "html", null, true);
            echo "\">
                                    <br>";
            // line 43
            echo form_error("nis");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
            // line 49
            echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
            echo "\">
                                    <br>";
            // line 50
            echo form_error("nama");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Jenis Kelamin <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\"";
            // line 56
            echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki"), "html", null, true);
            echo "> Laki-laki</label>
                                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\"";
            // line 57
            echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan"), "html", null, true);
            echo "> Perempuan</label>
                                    <br>";
            // line 58
            echo form_error("jenis_kelamin");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Tahun Masuk <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"tahun_masuk\" class=\"span2\" maxlength=\"4\" value=\"";
            // line 64
            echo twig_escape_filter($this->env, set_value("tahun_masuk"), "html", null, true);
            echo "\">
                                    <br>";
            // line 65
            echo form_error("tahun_masuk");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Kelas <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <select class=\"span3\" name=\"kelas_id\">
                                        <option value=\"\">--pilih--</option>";
            // line 73
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                // line 74
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, set_select("kelas_id", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id")), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
                echo "</option>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                                    </select>
                                    <br>";
            // line 77
            echo form_error("kelas_id");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Tempat Lahir</label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
            // line 83
            echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
            echo "\">
                                    <br>";
            // line 84
            echo form_error("tempat_lahir");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Tanggal Lahir</label>
                                <div class=\"controls\">
                                    <select class=\"span2\" style=\"width: 10%;\" name=\"tgl_lahir\">
                                        <option value=\"\">Tgl</option>";
            // line 92
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 93
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "</option>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "                                    </select>
                                    <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                                        <option value=\"\">Bulan</option>";
            // line 98
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 12));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 99
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo "</option>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "                                    </select>
                                    <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
            // line 102
            echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
            echo "\" placeholder=\"Tahun\">
                                    <br>";
            // line 103
            echo form_error("thn_lahir");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Agama</label>
                                <div class=\"controls\">
                                    <select name=\"agama\" class=\"span2\">
                                        <option value=\"\">--pilih--</option>
                                        <option value=\"ISLAM\"";
            // line 111
            echo twig_escape_filter($this->env, set_select("agama", "ISLAM"), "html", null, true);
            echo ">ISLAM</option>
                                        <option value=\"KRISTEN\"";
            // line 112
            echo twig_escape_filter($this->env, set_select("agama", "KRISTEN"), "html", null, true);
            echo ">KRISTEN</option>
                                        <option value=\"KATOLIK\"";
            // line 113
            echo twig_escape_filter($this->env, set_select("agama", "KATOLIK"), "html", null, true);
            echo ">KATOLIK</option>
                                        <option value=\"HINDU\"";
            // line 114
            echo twig_escape_filter($this->env, set_select("agama", "HINDU"), "html", null, true);
            echo ">HINDU</option>
                                        <option value=\"BUDHA\"";
            // line 115
            echo twig_escape_filter($this->env, set_select("agama", "BUDHA"), "html", null, true);
            echo ">BUDHA</option>
                                    </select>
                                    <br>";
            // line 117
            echo form_error("agama");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Alamat</label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"alamat\" class=\"span8\" value=\"";
            // line 123
            echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
            echo "\">
                                    <br>";
            // line 124
            echo form_error("alamat");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
            // line 130
            echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
            echo "\" placeholder=\"alamat email\">
                                    <br>";
            // line 131
            echo form_error("username");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
            // line 137
            echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
            echo "\">
                                    <br>";
            // line 138
            echo form_error("password");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
            // line 144
            echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
            echo "\">
                                    <br>";
            // line 145
            echo form_error("password2");
            echo "
                                </div>
                            </div>
                            <!-- <div class=\"control-group\">
                                <label class=\"control-label\">Orang Tua ? <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"checkbox\" name=\"is_orangtua\" class=\"span5\" value=\"1\"";
            // line 151
            echo twig_escape_filter($this->env, set_checkbox("is_orangtua", "1", false), "html", null, true);
            echo ">
                                    <br>";
            // line 152
            echo form_error("is_orangtua");
            echo "
                                </div>
                            </div> -->
                            
                            <div class=\"control-group\">
                                <div class=\"controls\">
                                    <button type=\"submit\" class=\"btn btn-primary\">Register</button>
                                </div>
                            </div>";
            // line 161
            echo form_close();
            echo "
                    </div>";
        }
        // line 165
        if ((get_pengaturan("registrasi-pengajar", "value") == 1)) {
            // line 166
            echo "                    <div class=\"tab-pane fade";
            echo ((((isset($context["sebagai"]) ? $context["sebagai"] : null) == "pengajar")) ? ("active") : (""));
            echo " in\" id=\"register-pengajar\">";
            // line 167
            echo form_open_multipart("login/register/pengajar", array("class" => "form-horizontal row-fluid"));
            echo "
                            <div class=\"control-group\">
                                <label class=\"control-label\">NIP</label>
                                <div class=\"controls\">
                                    <input type=\"text\" id=\"nip\" name=\"nip\" class=\"span4\" value=\"";
            // line 171
            echo twig_escape_filter($this->env, set_value("nip"), "html", null, true);
            echo "\">
                                    <br>";
            // line 172
            echo form_error("nip");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
            // line 178
            echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
            echo "\">
                                    <br>";
            // line 179
            echo form_error("nama");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Jenis Kelamin <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\"";
            // line 185
            echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki"), "html", null, true);
            echo "> Laki-laki</label>
                                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\"";
            // line 186
            echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan"), "html", null, true);
            echo "> Perempuan</label>
                                    <br>";
            // line 187
            echo form_error("jenis_kelamin");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Tempat Lahir</label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
            // line 193
            echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
            echo "\">
                                    <br>";
            // line 194
            echo form_error("tempat_lahir");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Tanggal Lahir</label>
                                <div class=\"controls\">
                                    <select class=\"span2\" style=\"width: 10%;\" name=\"tgl_lahir\">
                                        <option value=\"\">Tgl</option>";
            // line 202
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 203
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "</option>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 205
            echo "                                    </select>
                                    <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                                        <option value=\"\">Bulan</option>";
            // line 208
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 12));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 209
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo "</option>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 211
            echo "                                    </select>
                                    <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
            // line 212
            echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
            echo "\" placeholder=\"Tahun\">
                                    <br>";
            // line 213
            echo form_error("thn_lahir");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Alamat</label>
                                <div class=\"controls\">
                                    <input type=\"text\" name=\"alamat\" class=\"span10\" value=\"";
            // line 219
            echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
            echo "\">
                                    <br>";
            // line 220
            echo form_error("alamat");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
            // line 226
            echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
            echo "\" placeholder=\"alamat email\">
                                    <br>";
            // line 227
            echo form_error("username");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
            // line 233
            echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
            echo "\">
                                    <br>";
            // line 234
            echo form_error("password");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
                                <div class=\"controls\">
                                    <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
            // line 240
            echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
            echo "\">
                                    <br>";
            // line 241
            echo form_error("password2");
            echo "
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <div class=\"controls\">
                                    <button type=\"submit\" class=\"btn btn-primary\">Register</button>
                                </div>
                            </div>";
            // line 249
            echo form_close();
            echo "
                    </div>";
        }
        // line 252
        echo "
                </div>
            </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  530 => 252,  525 => 249,  515 => 241,  511 => 240,  502 => 234,  498 => 233,  489 => 227,  485 => 226,  476 => 220,  472 => 219,  463 => 213,  459 => 212,  456 => 211,  444 => 209,  440 => 208,  436 => 205,  424 => 203,  420 => 202,  410 => 194,  406 => 193,  397 => 187,  393 => 186,  389 => 185,  380 => 179,  376 => 178,  367 => 172,  363 => 171,  356 => 167,  352 => 166,  350 => 165,  345 => 161,  334 => 152,  330 => 151,  321 => 145,  317 => 144,  308 => 138,  304 => 137,  295 => 131,  291 => 130,  282 => 124,  278 => 123,  269 => 117,  264 => 115,  260 => 114,  256 => 113,  252 => 112,  248 => 111,  237 => 103,  233 => 102,  230 => 101,  218 => 99,  214 => 98,  210 => 95,  198 => 93,  194 => 92,  184 => 84,  180 => 83,  171 => 77,  168 => 76,  156 => 74,  152 => 73,  142 => 65,  138 => 64,  129 => 58,  125 => 57,  121 => 56,  112 => 50,  108 => 49,  99 => 43,  95 => 42,  87 => 37,  83 => 36,  81 => 35,  77 => 32,  72 => 30,  70 => 29,  65 => 26,  63 => 25,  60 => 23,  55 => 20,  52 => 18,  50 => 17,  48 => 15,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
