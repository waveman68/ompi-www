<?
$subject_val = "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Nov 22 13:11:36 2013" -->
<!-- isoreceived="20131122181136" -->
<!-- sent="Fri, 22 Nov 2013 18:11:35 +0000" -->
<!-- isosent="20131122181135" -->
<!-- name="Gans, Jason D" -->
<!-- email="jgans_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI" -->
<!-- id="3AC6D38C07BF6248ACD81166D380DB1C3874BBA3_at_ECS-EXG-P-MB03.win.lanl.gov" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="A88E131E-3E20-44FA-AE26-7BB505C80516_at_open-mpi.org" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI<br>
<strong>From:</strong> Gans, Jason D (<em>jgans_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-11-22 13:11:35
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="23025.php">Ralph Castain: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<li><strong>Previous message:</strong> <a href="23023.php">Ralph Castain: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<li><strong>In reply to:</strong> <a href="23023.php">Ralph Castain: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="23026.php">Lloyd Brown: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<li><strong>Reply:</strong> <a href="23026.php">Lloyd Brown: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I have tried the 1.7 series (specifically 1.7.3) and I get the same behavior.
<br>
<p>When I run &quot;mpirun -oversubscribe -np 24 hostname&quot;, three instances of &quot;hostname&quot; are run on each node.
<br>
<p>The contents of the $PBS_NODEFILE are:
<br>
n0007
<br>
n0006
<br>
n0005
<br>
n0004
<br>
n0003
<br>
n0002
<br>
n0001
<br>
n0000
<br>
<p>but, since I have compiled OpenMPI using the &quot;--with-tm&quot;,  it appears that OpenMPI is not using the $PBS_NODEFILE (which I tested by modifying the torque pbs_mom to write a $PBS_NODEFILE that contained &quot;slot=xx&quot; information for each node. mpirun complained when I did this).
<br>
<p>Regards,
<br>
<p>Jason
<br>
<p>________________________________
<br>
From: users [users-bounces_at_[hidden]] on behalf of Ralph Castain [rhc_at_[hidden]]
<br>
Sent: Friday, November 22, 2013 11:04 AM
<br>
To: Open MPI Users
<br>
Subject: Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI
<br>
<p>Really shouldn't matter - this is clearly a bug in OMPI if it is doing mapping as you describe. Out of curiosity, have you tried the 1.7 series? Does it behave the same?
<br>
<p>I can take a look at the code later today and try to figure out what happened.
<br>
<p>On Nov 22, 2013, at 9:56 AM, Jason Gans &lt;jgans_at_[hidden]&lt;mailto:jgans_at_[hidden]&gt;&gt; wrote:
<br>
<p>On 11/22/13 10:47 AM, Reuti wrote:
<br>
Hi,
<br>
<p>Am 22.11.2013 um 17:32 schrieb Gans, Jason D:
<br>
<p>I would like to run an instance of my application on every *core* of a small cluster. I am using Torque 2.5.12 to run jobs on the cluster. The cluster in question is a heterogeneous collection of machines that are all past their prime. Specifically, the number of cores ranges from 2-8. Here is the Torque &quot;nodes&quot; file:
<br>
<p>n0000 np=2
<br>
n0001 np=2
<br>
n0002 np=8
<br>
n0003 np=8
<br>
n0004 np=2
<br>
n0005 np=2
<br>
n0006 np=2
<br>
n0007 np=4
<br>
<p>When I use openmpi-1.6.3, I can oversubscribe nodes but the tasks are allocated to nodes without regard to the number of cores on each node (specified by the &quot;np=xx&quot; in the nodes file). For example, when I run &quot;mpirun -np 24 hostname&quot;, mpirun places three instances of &quot;hostname&quot; on each node, despite the fact that some nodes only have two processors and some have more.
<br>
You submitted the job itself by requesting 24 cores for it too?
<br>
<p>-- Reuti
<br>
Since there are only 8 Torque nodes in the cluster, I submitted the job by requesting 8 nodes, i.e. &quot;qsub -I -l nodes=8&quot;.
<br>
<p><p>Is there a way to have OpenMPI &quot;gracefully&quot; oversubscribe nodes by allocating instances based on the &quot;np=xx&quot; information in the Torque nodes file? It this a Torque problem?
<br>
<p>p.s. I do get the desired behavior when I run *without* Torque and specify the following machine file to mpirun:
<br>
<p>n0000 slots=2
<br>
n0001 slots=2
<br>
n0002 slots=8
<br>
n0003 slots=8
<br>
n0004 slots=2
<br>
n0005 slots=2
<br>
n0006 slots=2
<br>
n0007 slots=4
<br>
<p>Regards,
<br>
<p>Jason
<br>
<p><p><p>_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;mailto:users_at_[hidden]&gt;
<br>
<a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;mailto:users_at_[hidden]&gt;
<br>
<a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
<p>_______________________________________________
<br>
users mailing list
<br>
users_at_[hidden]&lt;mailto:users_at_[hidden]&gt;
<br>
<a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
<br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/users/att-23024/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="23025.php">Ralph Castain: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<li><strong>Previous message:</strong> <a href="23023.php">Ralph Castain: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<li><strong>In reply to:</strong> <a href="23023.php">Ralph Castain: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="23026.php">Lloyd Brown: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<li><strong>Reply:</strong> <a href="23026.php">Lloyd Brown: "Re: [OMPI users] Oversubscription of nodes with Torque and OpenMPI"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
