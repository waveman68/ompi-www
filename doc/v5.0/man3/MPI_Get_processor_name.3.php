<?php
$topdir = "../../..";
$title = "MPI_Get_processor_name(3) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: MPI_GET_PROCESSOR_NAME(3)";

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
C]MPI_Get_processor_nameR] - Gets the name of the processor.
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h3><a name='sect2' href='#toc2'>C
Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect3' href='#toc3'>C]#include &lt;mpi.h&gt;int MPI_Get_processor_name(char *name, int *resultlen)R]Fortran
Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect4' href='#toc4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_GET_PROCESSOR_NAME(NAME,
RESULTLEN, IERROR)    CHARACTER*(*)   NAME    INTEGER     RESULTLEN, IERRORR]Fortran
2008 Syntax</a></h3>
<br>
<pre>

</pre>
<h2><a name='sect5' href='#toc5'>C]USE mpi_f08MPI_Get_processor_name(name, resultlen, ierror)    CHARACTER(LEN=MPI_MAX_PROCESSOR_NAME),
INTENT(OUT) :: name    INTEGER, INTENT(OUT) :: resultlen    INTEGER, OPTIONAL,
INTENT(OUT) :: ierrorR]Output Parameters</a></h2>

<dl>

<dt>[bu]</dt>
<dd>C]nameR] : A unique specifier
for the actual (as opposed to virtual) node. </dd>

<dt>[bu]</dt>
<dd>C]resultlenR] : Length
(in characters) of result returned in name. </dd>

<dt>[bu]</dt>
<dd>C]IERRORR] : Fortran only:
Error status (integer). </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
<p>
This routine returns the C]nameR] of
the processor on which it was called at the moment of the call. The C]nameR]
is a character string for maximum flexibility. From this value it must be
possible to identify a specific piece of hardware. The argument C]nameR]
must represent storage that is at least C]MPI_MAX_PROCESSOR_NAMER] characters
long. <p>
The number of characters actually written is returned in the output
argument, C]resultlenR].
<h2><a name='sect7' href='#toc7'>Notes</a></h2>
<p>
The user must provide at least C]MPI_MAX_PROCESSOR_NAMER]
space to write the processor C]nameR]; processor C]nameR]s can be this
long. The user should examine the output argument, C]resultlenR], to determine
the actual length of the C]nameR].
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
<p>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. <p>
Before the error value is returned, the current MPI
error handler is called. By default, this error handler aborts the MPI job,
except for I/O function errors. The error handler may be changed with C]MPI_Comm_set_errhandlerR];
the predefined error handler C]MPI_ERRORS_RETURNR] may be used to cause
error values to be returned. Note that MPI does not guarantee that an MPI
program can continue past an error. <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<ul>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>C]#include <mpi.h>int MPI_Get_processor_name(char *name, int *resultlen)R]Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_GET_PROCESSOR_NAME(NAME, RESULTLEN, IERROR)    CHARACTER*(*)   NAME    INTEGER     RESULTLEN, IERRORR]Fortran 2008 Syntax</a></li>
</ul>
<li><a name='toc5' href='#sect5'>C]USE mpi_f08MPI_Get_processor_name(name, resultlen, ierror)    CHARACTER(LEN=MPI_MAX_PROCESSOR_NAME), INTENT(OUT) :: name    INTEGER, INTENT(OUT) :: resultlen    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorR]Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Notes</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
