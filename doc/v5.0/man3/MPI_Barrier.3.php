<?php
$topdir = "../../..";
$title = "MPI_Barrier(3) man page (version 5.0.0rc2)";
$meta_desc = "Open MPI v5.0.0rc2 man page: MPI_BARRIER(3)";

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
MPI_Barrier, <a href="../man3/MPI_Ibarrier.3.php">MPI_Ibarrier</a> - Synchronization between MPI processes
in a group
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h3><a name='sect2' href='#toc2'>C Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect3' href='#toc3'>C]#include &lt;mpi.h&gt;int MPI_Barrier(MPI_Comm)int <a href="../man3/MPI_Ibarrier.3.php">MPI_Ibarrier</a>(MPI_Comm comm,
MPI_Request *request)int <a href="../man3/MPI_Barrier_init.3.php">MPI_barrier_init</a>(MPI_Comm comm, MPI_Info info,
MPI_Request *request)R]Fortran Syntax</a></h3>
<br>
<pre>

</pre>
<h3><a name='sect4' href='#toc4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_BARRIER(COMM, IERROR)
   INTEGER COMM, IERRORMPI_IBARRIER(COMM, REQUEST, IERROR)    INTEGER COMM,
REQUEST, IERRORMPI_BARRIER_INIT(COMM, INFO, REQUEST, IERROR)    INTEGER
COMM, INFO, REQUEST, IERRORR]Fortran 2008 Syntax</a></h3>
<br>
<pre>

</pre>
<h2><a name='sect5' href='#toc5'>C]USE mpi_f08MPI_Barrier(comm, ierror)    TYPE(MPI_Comm), INTENT(IN) ::
comm    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorMPI_Ibarrier(comm, request,
ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    TYPE(MPI_Request), INTENT
(OUT) :: request    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorMPI_Barrier_init(comm,
info, request, ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    TYPE(MPI_Info),
INTENT(IN) :: info    TYPE(MPI_Request), INTENT (OUT) :: request    INTEGER,
OPTIONAL, INTENT(OUT) :: ierrorR]Input Parameter</a></h2>

<dl>

<dt>[bu]</dt>
<dd>C]commR] : Communicator
(handle). </dd>

<dt>[bu]</dt>
<dd>C]infoR] : Info (handle, persistent only). # Output Parameters
</dd>

<dt>[bu]</dt>
<dd>C]requestR] : Request (handle, non-blocking only). </dd>

<dt>[bu]</dt>
<dd>C]IERRORR] : Fortran
only: Error status (integer). # Description An MPI barrier completes after
all groups members have entered the barrier. # When Communicator is an Inter-Communicator
When the communicator is an inter-communicator, the barrier operation is
performed across all processes in both groups. All processes in the first
group may exit the barrier when all processes in the second group have
entered the barrier. # Errors Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with C]MPI_Comm_set_errhandlerR];
the predefined error handler C]MPI_ERRORS_RETURNR] may be used to cause
error values to be returned. Note that MPI does not guarantee that an MPI
program can continue past an error. # See Also C]MPI_BcastR](3) </dd>
</dl>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<ul>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>C]#include <mpi.h>int MPI_Barrier(MPI_Comm)int <a href="../man3/MPI_Ibarrier.3.php">MPI_Ibarrier</a>(MPI_Comm comm, MPI_Request *request)int <a href="../man3/MPI_Barrier_init.3.php">MPI_barrier_init</a>(MPI_Comm comm, MPI_Info info, MPI_Request *request)R]Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C]USE MPI! or the older form: INCLUDE [aq]mpif.h[aq]MPI_BARRIER(COMM, IERROR)    INTEGER COMM, IERRORMPI_IBARRIER(COMM, REQUEST, IERROR)    INTEGER COMM, REQUEST, IERRORMPI_BARRIER_INIT(COMM, INFO, REQUEST, IERROR)    INTEGER COMM, INFO, REQUEST, IERRORR]Fortran 2008 Syntax</a></li>
</ul>
<li><a name='toc5' href='#sect5'>C]USE mpi_f08MPI_Barrier(comm, ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorMPI_Ibarrier(comm, request, ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    TYPE(MPI_Request), INTENT (OUT) :: request    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorMPI_Barrier_init(comm, info, request, ierror)    TYPE(MPI_Comm), INTENT(IN) :: comm    TYPE(MPI_Info), INTENT(IN) :: info    TYPE(MPI_Request), INTENT (OUT) :: request    INTEGER, OPTIONAL, INTENT(OUT) :: ierrorR]Input Parameter</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
