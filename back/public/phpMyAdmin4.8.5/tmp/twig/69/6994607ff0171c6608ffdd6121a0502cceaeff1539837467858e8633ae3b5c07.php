<?php

/* table/search/input_box.twig */
class __TwigTemplate_76492f0a41b93446eb4ab121215263896a5262e60a7cfce62212e9b80fb9f0aa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        if ((($context["foreigners"] ?? null) && call_user_func_array($this->env->getFunction('Relation_searchColumnInForeigners')->getCallable(), [($context["foreigners"] ?? null), ($context["column_name"] ?? null)]))) {
            // line 3
            if (twig_test_iterable($this->getAttribute(($context["foreign_data"] ?? null), "disp_row", [], "array"))) {
                // line 4
                echo "        <select name=\"criteriaValues[";
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "]\"
            id=\"";
                // line 5
                echo twig_escape_filter($this->env, ($context["column_id"] ?? null), "html", null, true);
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "\">";
                // line 6
                echo call_user_func_array($this->env->getFunction('Relation_foreignDropdown')->getCallable(), [$this->getAttribute(                // line 7
($context["foreign_data"] ?? null), "disp_row", [], "array"), $this->getAttribute(                // line 8
($context["foreign_data"] ?? null), "foreign_field", [], "array"), $this->getAttribute(                // line 9
($context["foreign_data"] ?? null), "foreign_display", [], "array"), "",                 // line 11
($context["foreign_max_limit"] ?? null)]);
                // line 12
                echo "
        </select>";
            } elseif (($this->getAttribute(            // line 14
($context["foreign_data"] ?? null), "foreign_link", [], "array") == true)) {
                // line 15
                echo "        <input type=\"text\"
            id=\"";
                // line 16
                echo twig_escape_filter($this->env, ($context["column_id"] ?? null), "html", null, true);
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "\"
            name=\"criteriaValues[";
                // line 17
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "]\"
            id=\"field_";
                // line 18
                echo twig_escape_filter($this->env, ($context["column_name_hash"] ?? null), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "]\"
            class=\"textfield\"";
                // line 20
                if ($this->getAttribute(($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array", true, true)) {
                    // line 21
                    echo "                value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array"), "html", null, true);
                    echo "\"";
                }
                // line 22
                echo " />
        <a class=\"ajax browse_foreign\" href=\"browse_foreigners.php\" data-post=\"";
                // line 24
                echo PhpMyAdmin\Url::getCommon(["db" => ($context["db"] ?? null), "table" => ($context["table"] ?? null)], "");
                // line 25
                echo "&amp;field=";
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["column_name"] ?? null)), "html", null, true);
                echo "&amp;fieldkey=";
                // line 26
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "&amp;fromsearch=1\">";
                // line 27
                echo twig_replace_filter($this->getAttribute(($context["titles"] ?? null), "Browse", [], "array"), ["'" => "\\'"]);
                echo "
        </a>";
            }
        } elseif (twig_in_filter(        // line 30
($context["column_type"] ?? null), PhpMyAdmin\Util::getGISDatatypes())) {
            // line 31
            echo "    <input type=\"text\"
        name=\"criteriaValues[";
            // line 32
            echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
            echo "]\"
        size=\"40\"
        class=\"textfield\"
        id=\"field_";
            // line 35
            echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
            echo "\" />";
            // line 36
            if (($context["in_fbs"] ?? null)) {
                // line 37
                $context["edit_url"] = ("gis_data_editor.php" . PhpMyAdmin\Url::getCommon());
                // line 38
                $context["edit_str"] = PhpMyAdmin\Util::getIcon("b_edit", _gettext("Edit/Insert"));
                // line 39
                echo "        <span class=\"open_search_gis_editor\">";
                // line 40
                echo PhpMyAdmin\Util::linkOrButton(($context["edit_url"] ?? null), ($context["edit_str"] ?? null), [], "_blank");
                echo "
        </span>";
            }
        } elseif (((is_string($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 =         // line 43
($context["column_type"] ?? null)) && is_string($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = "enum") && ('' === $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a || 0 === strpos($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5, $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a))) || ((is_string($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 =         // line 44
($context["column_type"] ?? null)) && is_string($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = "set") && ('' === $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 || 0 === strpos($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57, $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9))) && ($context["in_zoom_search_edit"] ?? null)))) {
            // line 45
            $context["in_zoom_search_edit"] = false;
            // line 46
            $context["value"] = twig_split_filter($this->env, twig_replace_filter(twig_slice($this->env, twig_escape_filter($this->env, ($context["column_type"] ?? null)), 5,  -1), ["&#039;" => ""]), ", ");
            // line 47
            $context["cnt_value"] = twig_length_filter($this->env, ($context["value"] ?? null));
            // line 54
            if ((((is_string($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["column_type"] ?? null)) && is_string($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = "enum") && ('' === $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 || 0 === strpos($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217, $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105))) &&  !($context["in_zoom_search_edit"] ?? null)) || ((is_string($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 =             // line 55
($context["column_type"] ?? null)) && is_string($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = "set") && ('' === $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 || 0 === strpos($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779, $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1))) && ($context["in_zoom_search_edit"] ?? null)))) {
                // line 56
                echo "        <select name=\"criteriaValues[";
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "]\"
            id=\"";
                // line 57
                echo twig_escape_filter($this->env, ($context["column_id"] ?? null), "html", null, true);
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "\">";
            } else {
                // line 59
                echo "        <select name=\"criteriaValues[";
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "]\"
            id=\"";
                // line 60
                echo twig_escape_filter($this->env, ($context["column_id"] ?? null), "html", null, true);
                echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
                echo "\"
            multiple=\"multiple\"
            size=\"";
                // line 62
                echo twig_escape_filter($this->env, min(3, ($context["cnt_value"] ?? null)), "html", null, true);
                echo "\">";
            }
            // line 65
            echo "    <option value=\"\"></option>";
            // line 66
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (($context["cnt_value"] ?? null) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 67
                if ((($this->getAttribute(($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array", true, true) && twig_test_iterable($this->getAttribute(                // line 68
($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array"))) && twig_in_filter($this->getAttribute(                // line 69
($context["value"] ?? null), $context["i"], [], "array"), $this->getAttribute(($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array")))) {
                    // line 70
                    echo "            <option value=\"";
                    echo $this->getAttribute(($context["value"] ?? null), $context["i"], [], "array");
                    echo "\" selected>";
                    // line 71
                    echo $this->getAttribute(($context["value"] ?? null), $context["i"], [], "array");
                    echo "
            </option>";
                } else {
                    // line 74
                    echo "            <option value=\"";
                    echo $this->getAttribute(($context["value"] ?? null), $context["i"], [], "array");
                    echo "\">";
                    // line 75
                    echo $this->getAttribute(($context["value"] ?? null), $context["i"], [], "array");
                    echo "
            </option>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "    </select>";
        } else {
            // line 81
            $context["the_class"] = "textfield";
            // line 82
            if ((($context["column_type"] ?? null) == "date")) {
                // line 83
                $context["the_class"] = (($context["the_class"] ?? null) . " datefield");
            } elseif (((            // line 84
($context["column_type"] ?? null) == "datetime") || (is_string($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = ($context["column_type"] ?? null)) && is_string($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = "timestamp") && ('' === $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 || 0 === strpos($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0, $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866))))) {
                // line 85
                $context["the_class"] = (($context["the_class"] ?? null) . " datetimefield");
            } elseif ((is_string($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f =             // line 86
($context["column_type"] ?? null)) && is_string($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = "bit") && ('' === $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 || 0 === strpos($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f, $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7)))) {
                // line 87
                $context["the_class"] = (($context["the_class"] ?? null) . " bit");
            }
            // line 89
            echo "    <input type=\"text\"
        name=\"criteriaValues[";
            // line 90
            echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
            echo "]\"
        size=\"40\"
        class=\"";
            // line 92
            echo twig_escape_filter($this->env, ($context["the_class"] ?? null), "html", null, true);
            echo "\"
        id=\"";
            // line 93
            echo twig_escape_filter($this->env, ($context["column_id"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["column_index"] ?? null), "html", null, true);
            echo "\"";
            // line 94
            if ($this->getAttribute(($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array", true, true)) {
                // line 95
                echo "           value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["criteria_values"] ?? null), ($context["column_index"] ?? null), [], "array"), "html", null, true);
                echo "\"";
            }
            // line 96
            echo " />";
        }
    }

    public function getTemplateName()
    {
        return "table/search/input_box.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 96,  217 => 95,  215 => 94,  211 => 93,  207 => 92,  202 => 90,  199 => 89,  196 => 87,  194 => 86,  192 => 85,  190 => 84,  188 => 83,  186 => 82,  184 => 81,  181 => 79,  172 => 75,  168 => 74,  163 => 71,  159 => 70,  157 => 69,  156 => 68,  155 => 67,  151 => 66,  149 => 65,  145 => 62,  139 => 60,  134 => 59,  129 => 57,  124 => 56,  122 => 55,  121 => 54,  119 => 47,  117 => 46,  115 => 45,  113 => 44,  112 => 43,  107 => 40,  105 => 39,  103 => 38,  101 => 37,  99 => 36,  96 => 35,  90 => 32,  87 => 31,  85 => 30,  80 => 27,  77 => 26,  73 => 25,  71 => 24,  68 => 22,  63 => 21,  61 => 20,  55 => 18,  51 => 17,  46 => 16,  43 => 15,  41 => 14,  38 => 12,  36 => 11,  35 => 9,  34 => 8,  33 => 7,  32 => 6,  28 => 5,  23 => 4,  21 => 3,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/input_box.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\search\\input_box.twig");
    }
}
