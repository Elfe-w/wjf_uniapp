<?php

/* server/sub_page_header.twig */
class __TwigTemplate_a0f41e876a6e5d9793b061f4da26671d92a401b7494dfef0dfcd2fe611128016 extends Twig_Template
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
        $context["header"] = ["variables" => ["image" => "s_vars", "text" => _gettext("Server variables and settings")], "engines" => ["image" => "b_engine", "text" => _gettext("Storage engines")], "plugins" => ["image" => "b_engine", "text" => _gettext("Plugins")], "binlog" => ["image" => "s_tbl", "text" => _gettext("Binary log")], "collations" => ["image" => "s_asci", "text" => _gettext("Character sets and collations")], "replication" => ["image" => "s_replication", "text" => _gettext("Replication")], "database_statistics" => ["image" => "s_db", "text" => _gettext("Databases statistics")], "databases" => ["image" => "s_db", "text" => _gettext("Databases")], "privileges" => ["image" => "b_usrlist", "text" => _gettext("Privileges")]];
        // line 40
        echo "<h2>";
        // line 41
        if ((((isset($context["is_image"]) || array_key_exists("is_image", $context))) ? (_twig_default_filter(($context["is_image"] ?? null), true)) : (true))) {
            // line 42
            echo PhpMyAdmin\Util::getImage($this->getAttribute($this->getAttribute(($context["header"] ?? null), ($context["type"] ?? null), [], "array"), "image", [], "array"));
        } else {
            // line 44
            echo PhpMyAdmin\Util::getIcon($this->getAttribute($this->getAttribute(($context["header"] ?? null), ($context["type"] ?? null), [], "array"), "image", [], "array"));
        }
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["header"] ?? null), ($context["type"] ?? null), [], "array"), "text", [], "array"), "html", null, true);
        // line 47
        echo (((isset($context["link"]) || array_key_exists("link", $context))) ? (PhpMyAdmin\Util::showMySQLDocu(($context["link"] ?? null))) : (""));
        echo "
</h2>
";
    }

    public function getTemplateName()
    {
        return "server/sub_page_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 47,  31 => 46,  28 => 44,  25 => 42,  23 => 41,  21 => 40,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "server/sub_page_header.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\server\\sub_page_header.twig");
    }
}
