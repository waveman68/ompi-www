<?php
$topdir = "../../..";
$title = "pps(1) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: pps(1)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<p>
pps - Request the status of one or more namespaces and/or nodes
<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
<br>
<pre>

</pre>
<h2><a name='sect2' href='#toc2'>C]pps [ options ]R]Description</a></h2>
<p>
C]ppsR]
<dl>

<dt>will request the status of the specified
namespaces and/or </dt>
<dd>nodes. If no namespace or node is given, then C]ppsR]
will request the status of all running jobs. This requires that C]ppsR]
connect to an appropriate server - the tool will automatically attempt to
do so, but options are provided to assist its search or to direct it to
a specific server. </dd>
</dl>

<h2><a name='sect3' href='#toc3'>Options</a></h2>
<p>
C]ppsR] supports the following options: <br>
<pre>

</pre>
<h2><a name='sect4' href='#toc4'>C]-h|--help                This help message-n|--nodes               Display Node
Information   --nspace              Nspace of job whose status is being requested-p|--pid
&lt;arg0&gt;          Specify pid of starter to be contacted (default is
                  to system server   --parseable           Provide parseable
outputR]Authors</a></h2>
<p>
The OpenPMIx maintainers [en]
<dl>

<dt>see <i>https://github.com/openpmix/openpmix</i>
</dt>
<dd>or the file C]AUTHORSR]. </dd>
</dl>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Synopsis</a></li>
<li><a name='toc2' href='#sect2'>C]pps [ options ]R]Description</a></li>
<li><a name='toc3' href='#sect3'>Options</a></li>
<li><a name='toc4' href='#sect4'>C]-h|--help                This help message-n|--nodes               Display Node Information   --nspace              Nspace of job whose status is being requested-p|--pid <arg0>          Specify pid of starter to be contacted (default is                         to system server   --parseable           Provide parseable outputR]Authors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
