<?php

/* columns_definitions/column_default.twig */
class __TwigTemplate_9bb7c0d2873fbc74cf931c27ac3daefb14b1717f3efe96d36054541add951372 extends Twig_Template
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
        // line 3
        ob_start();
        echo _pgettext(        "for default", "None");
        $context["translation"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 4
        $context["default_options"] = ["NONE" =>         // line 5
($context["translation"] ?? null), "USER_DEFINED" => _gettext("As defined:"), "NULL" => "NULL", "CURRENT_TIMESTAMP" => "CURRENT_TIMESTAMP"];
        // line 12
        $context["default_value"] = "";
        // line 13
        if ($this->getAttribute(($context["column_meta"] ?? null), "DefaultValue", [], "array", true, true)) {
            // line 14
            $context["default_value"] = $this->getAttribute(($context["column_meta"] ?? null), "DefaultValue", [], "array");
        }
        // line 16
        if ((($context["type_upper"] ?? null) == "BIT")) {
            // line 17
            $context["default_value"] = PhpMyAdmin\Util::convertBitDefaultValue($this->getAttribute(($context["column_meta"] ?? null), "DefaultValue", [], "array"));
        } elseif (((        // line 18
($context["type_upper"] ?? null) == "BINARY") || (($context["type_upper"] ?? null) == "VARBINARY"))) {
            // line 19
            $context["default_value"] = bin2hex($this->getAttribute(($context["column_meta"] ?? null), "DefaultValue", [], "array"));
        }
        // line 21
        echo "
<select name=\"field_default_type[";
        // line 22
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    id=\"field_";
        // line 23
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    class=\"default_type\">";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["default_options"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 26
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"";
            // line 27
            if (($this->getAttribute(($context["column_meta"] ?? null), "DefaultType", [], "array", true, true) && ($this->getAttribute(            // line 28
($context["column_meta"] ?? null), "DefaultType", [], "array") == $context["key"]))) {
                // line 29
                echo "                selected=\"selected\"";
            }
            // line 30
            echo ">";
            // line 31
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
        </option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "</select>";
        // line 35
        if ((($context["char_editing"] ?? null) == "textarea")) {
            // line 36
            echo "    <textarea name=\"field_default_value[";
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "]\"
        cols=\"15\"
        class=\"textfield
        default_value\">";
            // line 39
            echo twig_escape_filter($this->env, ($context["default_value"] ?? null), "html", null, true);
            echo "</textarea>";
        } else {
            // line 41
            echo "    <input type=\"text\"
        name=\"field_default_value[";
            // line 42
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "]\"
        size=\"12\"
        value=\"";
            // line 44
            echo twig_escape_filter($this->env, ($context["default_value"] ?? null), "html", null, true);
            echo "\"
        class=\"textfield default_value\" />";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 44,  97 => 42,  94 => 41,  90 => 39,  83 => 36,  81 => 35,  79 => 34,  71 => 31,  69 => 30,  66 => 29,  64 => 28,  63 => 27,  59 => 26,  55 => 25,  49 => 23,  45 => 22,  42 => 21,  39 => 19,  37 => 18,  35 => 17,  33 => 16,  30 => 14,  28 => 13,  26 => 12,  24 => 5,  23 => 4,  19 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/column_default.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\columns_definitions\\column_default.twig");
    }
}
