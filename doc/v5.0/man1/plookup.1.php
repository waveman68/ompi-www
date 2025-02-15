<?php
$topdir = "../../..";
$title = "plookup(1) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: plookup(1)";

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
plookup - Request the value of one or more keys
<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
<br>
<pre>

</pre>
<h2><a name='sect2' href='#toc2'>C]plookup [ options ] [ keys ]R]Description</a></h2>
<p>
C]plookupR] will request the
value of the specified keys. This requires that C]plookupR] connect to an
appropriate server - the tool will automatically attempt to do so,
<dl>

<dt>but options
are provided </dt>
<dd>to assist its search or to direct it to a specific server.
Reserved keys must be provided in their string form - e.g., [lq]pmix.job.term.status[rq]
as opposed to the key[cq]s name of [lq]PMIX_JOB_TERM_STATUS[rq]. </dd>
</dl>

<h2><a name='sect3' href='#toc3'>Options</a></h2>
<p>
C]plookupR]
supports the following options: <br>
<pre>

</pre>
<h2><a name='sect4' href='#toc4'>C]-h|--help                This help message-p|--pid &lt;arg0&gt;          Specify starter
pid-t|--timeout             Max number of seconds to wait for data to become
                        available-v|--verbose             Be Verbose-w|--wait
              Wait for data to be availableR]Authors</a></h2>
<p>
The OpenPMIx maintainers
[en]
<dl>

<dt>see <i>https://github.com/openpmix/openpmix</i> </dt>
<dd>or the file C]AUTHORSR]. </dd>
</dl>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Synopsis</a></li>
<li><a name='toc2' href='#sect2'>C]plookup [ options ] [ keys ]R]Description</a></li>
<li><a name='toc3' href='#sect3'>Options</a></li>
<li><a name='toc4' href='#sect4'>C]-h|--help                This help message-p|--pid <arg0>          Specify starter pid-t|--timeout             Max number of seconds to wait for data to become                         available-v|--verbose             Be Verbose-w|--wait                Wait for data to be availableR]Authors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
