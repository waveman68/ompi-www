<? include("../../include/msg-header.inc"); ?>
<!-- received="Thu Jan  4 14:00:53 2007" -->
<!-- isoreceived="20070104190053" -->
<!-- sent="Thu, 4 Jan 2007 13:00:32 -0600" -->
<!-- isosent="20070104190032" -->
<!-- name="Grobe, Gary L. \(JSC-EV\)[ESCG]" -->
<!-- email="gary.l.grobe_at_[hidden]" -->
<!-- subject="Re: [OMPI users] Ompi failing on mx only" -->
<!-- id="559847D38F12F742B0EE27727596F42901A7EDF3_at_NDJSEVS14.ndc.nasa.gov" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="B1A7CE03-914A-4F90-9DB4-5700D3FAC5A9_at_lanl.gov" -->
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
<strong>From:</strong> Grobe, Gary L. \(JSC-EV\)[ESCG] (<em>gary.l.grobe_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-01-04 14:00:32
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2433.php">Jeff Squyres: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>Previous message:</strong> <a href="2431.php">Reese Faucette: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>In reply to:</strong> <a href="2425.php">Brian W. Barrett: "Re: [OMPI users] Ompi failing on mx only"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2433.php">Jeff Squyres: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>Reply:</strong> <a href="2433.php">Jeff Squyres: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>Reply:</strong> <a href="2434.php">George Bosilca: "Re: [OMPI users] Ompi failing on mx only"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I've grabbed last nights tarball (1.2b3r12981) and tried using the
<br>
shared mem transport on btl and mx,self on mtl, same results. What I
<br>
don't get is that, sometimes it works, and sometimes it doesn't (for
<br>
either). For example, I can run it 10 times successfully then incr the
<br>
-np from 7 to 10 across 3 nodes, and it'll immediately fail.
<br>
<p>Here's an example of one run right after another.
<br>
<p>$ mpirun --prefix /usr/local/openmpi-1.2b3r12981/ -x
<br>
LD_LIBRARY_PATH=${LD_LIBRARY_PATH} --hostfile ./h25-27 -np 10 --mca mtl
<br>
mx,self ./cpi                 
<br>
Process 0 of 10 is on node-25
<br>
Process 4 of 10 is on node-26
<br>
Process 1 of 10 is on node-25
<br>
Process 5 of 10 is on node-26
<br>
Process 2 of 10 is on node-25
<br>
Process 8 of 10 is on node-27
<br>
Process 6 of 10 is on node-26
<br>
Process 9 of 10 is on node-27
<br>
Process 7 of 10 is on node-26
<br>
Process 3 of 10 is on node-25
<br>
pi is approximately 3.1415926544231256, Error is 0.0000000008333325
<br>
wall clock time = 0.017513
<br>
<p>$ mpirun --prefix /usr/local/openmpi-1.2b3r12981/ -x
<br>
LD_LIBRARY_PATH=${LD_LIBRARY_PATH} --hostfile ./h25-27 -np 10 --mca mtl
<br>
mx,self ./cpi 
<br>
Signal:11 info.si_errno:0(Success) si_code:1(SEGV_MAPERR)
<br>
Failing at addr:(nil)
<br>
[0]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/libopen-pal.so.0(opal_backtrace_
<br>
print+0x1f) [0x2b8ddf3ccd3f]
<br>
[1] func:/usr/local/openmpi-1.2b3r12981/lib/libopen-pal.so.0
<br>
[0x2b8ddf3cb891]
<br>
[2] func:/lib/libpthread.so.0 [0x2b8ddf98f6c0]
<br>
[3] func:/opt/mx/lib/libmyriexpress.so(mx_open_endpoint+0x6df)
<br>
[0x2b8de25bf2af]
<br>
[4]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/openmpi/mca_btl_mx.so(mca_btl_mx
<br>
_component_init+0x5d7) [0x2b8de27dcd27]
<br>
[5]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/libmpi.so.0(mca_btl_base_select+
<br>
0x156) [0x2b8ddf125b46]
<br>
[6]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/openmpi/mca_bml_r2.so(mca_bml_r2
<br>
_component_init+0x11) [0x2b8de26d7491]
<br>
[7]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/libmpi.so.0(mca_bml_base_init+0x
<br>
7d) [0x2b8ddf12543d]
<br>
[8]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/openmpi/mca_pml_ob1.so(mca_pml_o
<br>
b1_component_init+0x6b) [0x2b8de23a4f8b]
<br>
[9]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/libmpi.so.0(mca_pml_base_select+
<br>
0x113) [0x2b8ddf12cea3]
<br>
[10]
<br>
func:/usr/local/openmpi-1.2b3r12981/lib/libmpi.so.0(ompi_mpi_init+0x45a)
<br>
[0x2b8ddf0f5bda]
<br>
[11] func:/usr/local/openmpi-1.2b3r12981/lib/libmpi.so.0(MPI_Init+0x83)
<br>
[0x2b8ddf116af3]
<br>
[12] func:./cpi(main+0x42) [0x400cd5]
<br>
[13] func:/lib/libc.so.6(__libc_start_main+0xe3) [0x2b8ddfab50e3]
<br>
[14] func:./cpi [0x400bd9]
<br>
*** End of error message ***
<br>
mpirun noticed that job rank 0 with PID 0 on node node-25 exited on
<br>
signal 11.
<br>
9 additional processes aborted (not shown) 
<br>
<p>-----Original Message-----
<br>
From: users-bounces_at_[hidden] [mailto:users-bounces_at_[hidden]] On
<br>
Behalf Of Brian W. Barrett
<br>
Sent: Tuesday, January 02, 2007 4:11 PM
<br>
To: Open MPI Users
<br>
Subject: Re: [OMPI users] Ompi failing on mx only
<br>
<p>Sorry to jump into the discussion late.  The mx btl does not support
<br>
communication between processes on the same node by itself, so you have
<br>
to include the shared memory transport when using MX.  This will
<br>
eventually be fixed, but likely not for the 1.2 release.  So if you do:
<br>
<p>&nbsp;&nbsp;&nbsp;mpirun --prefix /usr/local/openmpi-1.2b2 -x LD_LIBRARY_PATH --
<br>
hostfile ./h1-3 -np 2 --mca btl mx,sm,self ./cpi
<br>
<p>It should work much better.  As for the MTL, there is a bug in the MX
<br>
MTL for v1.2 that has been fixed, but after 1.2b2 that could cause the
<br>
random failures you were seeing.  It will work much better after
<br>
1.2b3 is released (or if you are feeling really lucky, you can try out
<br>
the 1.2 nightly tarballs).
<br>
<p>The MTL is a new feature in v1.2. It is a different communication
<br>
abstraction designed to support interconnects that have matching
<br>
implemented in the lower level library or in hardware (Myrinet/MX,
<br>
Portals, InfiniPath are currently implemented).  The MTL allows us to
<br>
exploit the low latency and asynchronous progress these libraries can
<br>
provide, but does mean multi-nic abilities are reduced.  Further, the
<br>
MTL is not well suited to interconnects like TCP or InfiniBand, so we
<br>
will continue supporting the BTL interface as well.
<br>
<p>Brian
<br>
<p><p>On Jan 2, 2007, at 2:44 PM, Grobe, Gary L. ((JSC-EV))[ESCG] wrote:
<br>
<p><span class="quotelev1">&gt; About the -x, I've been trying it both ways and prefer the latter, and
</span><br>
<p><span class="quotelev1">&gt; results for either are the same. But it's value is correct.
</span><br>
<span class="quotelev1">&gt; I've attached the ompi_info from node-1 and node-2. Sorry for not 
</span><br>
<span class="quotelev1">&gt; zipping them, but they were small and I think I'd have firewall 
</span><br>
<span class="quotelev1">&gt; issues.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; $ mpirun --prefix /usr/local/openmpi-1.2b2 -x LD_LIBRARY_PATH -- 
</span><br>
<span class="quotelev1">&gt; hostfile ./h13-15 -np 6 --mca pml cm ./cpi [node-14:19260] mx_connect 
</span><br>
<span class="quotelev1">&gt; fail for node-14:0 with key aaaaffff (error Endpoint closed or not 
</span><br>
<span class="quotelev1">&gt; connectable!) [node-14:19261] mx_connect fail for node-14:0 with key 
</span><br>
<span class="quotelev1">&gt; aaaaffff (error Endpoint closed or not connectable!) ...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Is there any info anywhere's on MTL? Anyways, I've run w/ mtl, and 
</span><br>
<span class="quotelev1">&gt; sometimes it actually worked once. But now I can't reproduce it and 
</span><br>
<span class="quotelev1">&gt; it's throwing sig 7's, 11's, and 4's depending upon the number of 
</span><br>
<span class="quotelev1">&gt; procs I give it. But now that you mention mapper, I take it that's 
</span><br>
<span class="quotelev1">&gt; what SEGV_MAPERR might be referring to. I'm looking into the
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; $ mpirun --prefix /usr/local/openmpi-1.2b2 -x LD_LIBRARY_PATH=$ 
</span><br>
<span class="quotelev1">&gt; {LD_LIBRARY_PATH} --hostfile ./h1-3 -np 5 --mca mtl mx,self ./cpi 
</span><br>
<span class="quotelev1">&gt; Process 4 of 5 is on node-2 Process 0 of 5 is on node-1 Process 1 of 5
</span><br>
<p><span class="quotelev1">&gt; is on node-1 Process 2 of 5 is on node-1 Process 3 of 5 is on node-1 
</span><br>
<span class="quotelev1">&gt; pi is approximately 3.1415926544231225, Error is 0.0000000008333294 
</span><br>
<span class="quotelev1">&gt; wall clock time = 0.019305
</span><br>
<span class="quotelev1">&gt; Signal:11 info.si_errno:0(Success) si_code:1(SEGV_MAPERR) Failing at 
</span><br>
<span class="quotelev1">&gt; addr:0x2b88243862be mpirun noticed that job rank 0 with PID 0 on node 
</span><br>
<span class="quotelev1">&gt; node-1 exited on signal 1.
</span><br>
<span class="quotelev1">&gt; 4 additional processes aborted (not shown) Or sometimes I'll get this 
</span><br>
<span class="quotelev1">&gt; error, just depending upon the number of procs ...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;  mpirun --prefix /usr/local/openmpi-1.2b2 -x LD_LIBRARY_PATH=$ 
</span><br>
<span class="quotelev1">&gt; {LD_LIBRARY_PATH} --hostfile ./h1-3 -np 7 --mca mtl mx,self ./cpi
</span><br>
<span class="quotelev1">&gt; Signal:7 info.si_errno:0(Success) si_code:2() Failing at 
</span><br>
<span class="quotelev1">&gt; addr:0x2aaaaaaab000 [0] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/libopen-pal.so.0
</span><br>
<span class="quotelev1">&gt; (opal_backtrace_print+0x1f) [0x2b9b7fa52d1f] [1] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/libopen-pal.so.0
</span><br>
<span class="quotelev1">&gt; [0x2b9b7fa51871]
</span><br>
<span class="quotelev1">&gt; [2] func:/lib/libpthread.so.0 [0x2b9b80013d00] [3] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/libmca_common_sm.so.0
</span><br>
<span class="quotelev1">&gt; (mca_common_sm_mmap_init+0x1e3) [0x2b9b8270ef83] [4] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/openmpi/mca_mpool_sm.so
</span><br>
<span class="quotelev1">&gt; [0x2b9b8260d0ff]
</span><br>
<span class="quotelev1">&gt; [5] func:/usr/local/openmpi-1.2b2/lib/libmpi.so.0
</span><br>
<span class="quotelev1">&gt; (mca_mpool_base_module_create+0x70) [0x2b9b7f7afac0] [6] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/openmpi/mca_btl_sm.so
</span><br>
<span class="quotelev1">&gt; (mca_btl_sm_add_procs_same_base_addr+0x907) [0x2b9b83070517] [7] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/openmpi/mca_bml_r2.so
</span><br>
<span class="quotelev1">&gt; (mca_bml_r2_add_procs+0x206) [0x2b9b82d5f576] [8] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/openmpi/mca_pml_ob1.so
</span><br>
<span class="quotelev1">&gt; (mca_pml_ob1_add_procs+0xe3) [0x2b9b82a2d0a3] [9] 
</span><br>
<span class="quotelev1">&gt; func:/usr/local/openmpi-1.2b2/lib/libmpi.so.0(ompi_mpi_init
</span><br>
<span class="quotelev1">&gt; +0x697) [0x2b9b7f77be07]
</span><br>
<span class="quotelev1">&gt; [10] func:/usr/local/openmpi-1.2b2/lib/libmpi.so.0(MPI_Init+0x83)
</span><br>
<span class="quotelev1">&gt; [0x2b9b7f79c943]
</span><br>
<span class="quotelev1">&gt; [11] func:./cpi(main+0x42) [0x400cd5]
</span><br>
<span class="quotelev1">&gt; [12] func:/lib/libc.so.6(__libc_start_main+0xf4) [0x2b9b8013a134] [13]
</span><br>
<p><span class="quotelev1">&gt; func:./cpi [0x400bd9]
</span><br>
<span class="quotelev1">&gt; *** End of error message ***
</span><br>
<span class="quotelev1">&gt; Process 4 of 7 is on node-2
</span><br>
<span class="quotelev1">&gt; Process 5 of 7 is on node-2
</span><br>
<span class="quotelev1">&gt; Process 6 of 7 is on node-2
</span><br>
<span class="quotelev1">&gt; Process 0 of 7 is on node-1
</span><br>
<span class="quotelev1">&gt; Process 1 of 7 is on node-1
</span><br>
<span class="quotelev1">&gt; Process 2 of 7 is on node-1
</span><br>
<span class="quotelev1">&gt; Process 3 of 7 is on node-1
</span><br>
<span class="quotelev1">&gt; pi is approximately 3.1415926544231239, Error is 0.0000000008333307 
</span><br>
<span class="quotelev1">&gt; wall clock time = 0.009331
</span><br>
<span class="quotelev1">&gt; Signal:11 info.si_errno:0(Success) si_code:1(SEGV_MAPERR) Failing at 
</span><br>
<span class="quotelev1">&gt; addr:0x2b4ba33652be
</span><br>
<span class="quotelev1">&gt; Signal:11 info.si_errno:0(Success) si_code:1(SEGV_MAPERR) Failing at 
</span><br>
<span class="quotelev1">&gt; addr:0x2b8685aba2be
</span><br>
<span class="quotelev1">&gt; Signal:11 info.si_errno:0(Success) si_code:1(SEGV_MAPERR) Failing at 
</span><br>
<span class="quotelev1">&gt; addr:0x2b304ffbe2be mpirun noticed that job rank 0 with PID 0 on node 
</span><br>
<span class="quotelev1">&gt; node-1 exited on signal 1.
</span><br>
<span class="quotelev1">&gt; 6 additional processes aborted (not shown)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Ok, so I take it one is down. Would this be the cause for all the 
</span><br>
<span class="quotelev1">&gt; different errors I'm seeing?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; $ fm_status
</span><br>
<span class="quotelev1">&gt; FMS Fabric status
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; 17      hosts known
</span><br>
<span class="quotelev1">&gt; 16      FMAs found
</span><br>
<span class="quotelev1">&gt; 3       un-ACKed alerts
</span><br>
<span class="quotelev1">&gt; Mapping is complete, last map generated by node-20 Database generation
</span><br>
<p><span class="quotelev1">&gt; not yet complete.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; From: users-bounces_at_[hidden] [mailto:users-bounces_at_open- mpi.org] 
</span><br>
<span class="quotelev1">&gt; On Behalf Of Reese Faucette
</span><br>
<span class="quotelev1">&gt; Sent: Tuesday, January 02, 2007 2:52 PM
</span><br>
<span class="quotelev1">&gt; To: Open MPI Users
</span><br>
<span class="quotelev1">&gt; Subject: Re: [OMPI users] Ompi failing on mx only
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Hi, Gary-
</span><br>
<span class="quotelev1">&gt; This looks like a config problem, and not a code problem yet.   
</span><br>
<span class="quotelev1">&gt; Could you send the output of mx_info from node-1 and from node-2?   
</span><br>
<span class="quotelev1">&gt; Also, forgive me counter-asking a possibly dumb OMPI question, but is 
</span><br>
<span class="quotelev1">&gt; &quot;-x LD_LIBRARY_PATH&quot; really what you want, as opposed to &quot;-x 
</span><br>
<span class="quotelev1">&gt; LD_LIBRARY_PATH=${LD_LIBRARY_PATH}&quot; ?  (I would not be surprised if 
</span><br>
<span class="quotelev1">&gt; not specifying a value defaults to this behavior, but have to ask).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Also, have you tried MX MTL as opposed to BTL?  --mca pml cm --mca mtl
</span><br>
<p><span class="quotelev1">&gt; mx,self  (it looks like you did)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; &quot;[node-2:10464] mx_connect fail for node-2:0 with key aaaaffff &quot;  
</span><br>
<span class="quotelev1">&gt; makes it look like your fabric may not be fully mapped or that you may
</span><br>
<p><span class="quotelev1">&gt; have a down link.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; thanks,
</span><br>
<span class="quotelev1">&gt; -reese
</span><br>
<span class="quotelev1">&gt; Myricom, Inc.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I was initially using 1.1.2 and moved to 1.2b2 because of a hang on
</span><br>
<span class="quotelev1">&gt; MPI_Bcast() which 1.2b2 reports to fix, and seemed to have done so.  
</span><br>
<span class="quotelev1">&gt; My compute nodes are 2 dual core xeons on myrinet with mx. The problem
</span><br>
<p><span class="quotelev1">&gt; is trying to get ompi running on mx only. My machine file is as 
</span><br>
<span class="quotelev1">&gt; follows ...
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; node-1 slots=4 max-slots=4
</span><br>
<span class="quotelev1">&gt; node-2 slots=4 max-slots=4
</span><br>
<span class="quotelev1">&gt; node-3 slots=4 max-slots=4
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; 'mpirun' with the minimum number of processes in order to get the 
</span><br>
<span class="quotelev1">&gt; error ...
</span><br>
<span class="quotelev1">&gt;         mpirun --prefix /usr/local/openmpi-1.2b2 -x LD_LIBRARY_PATH 
</span><br>
<span class="quotelev1">&gt; --hostfile ./h1-3 -np 2 --mca btl mx,self ./cpi
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I don't believe there'a anything wrong w/ the hardware as I can ping 
</span><br>
<span class="quotelev1">&gt; on mx between this failed node and the master fine. So I tried a 
</span><br>
<span class="quotelev1">&gt; different set of 3 nodes and I got the same error, it always fails on 
</span><br>
<span class="quotelev1">&gt; the 2nd node of any group of nodes I choose.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; &lt;node-2.out&gt;
</span><br>
<span class="quotelev1">&gt; &lt;node-1.out&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; users mailing list
</span><br>
<span class="quotelev1">&gt; users_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</span><br>
<p><pre>
-- 
   Brian Barrett
   Open MPI Team, CCS-1
   Los Alamos National Laboratory
_______________________________________________
users mailing list
users_at_[hidden]
<a href="http://www.open-mpi.org/mailman/listinfo.cgi/users">http://www.open-mpi.org/mailman/listinfo.cgi/users</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2433.php">Jeff Squyres: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>Previous message:</strong> <a href="2431.php">Reese Faucette: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>In reply to:</strong> <a href="2425.php">Brian W. Barrett: "Re: [OMPI users] Ompi failing on mx only"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2433.php">Jeff Squyres: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>Reply:</strong> <a href="2433.php">Jeff Squyres: "Re: [OMPI users] Ompi failing on mx only"</a>
<li><strong>Reply:</strong> <a href="2434.php">George Bosilca: "Re: [OMPI users] Ompi failing on mx only"</a>
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
