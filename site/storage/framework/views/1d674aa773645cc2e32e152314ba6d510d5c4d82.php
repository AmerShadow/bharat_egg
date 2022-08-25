<?php $__env->startSection('content'); ?>
<div class="row mt-2 p-0 m-0">
 <div class="col-md-3 ">
                                
                                    <div class="card indigo">
                                        <div class="card-body white-text">
                                            <div class="pull-right">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <p  >Total Students</p>
                                           
                                            <h4 class="text-center"><?php echo e(@App\User::count()); ?></h4>

                                        </div>
                                        
                                        <div class=" white-text" style="font-family: 'Barlow Semi Condensed', sans-serif;">
                                            <div class="text-center" style="padding: .5rem">
                                                    <a href="" class="white-text" >Go to Page &nbsp; <i class="fa fa-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                               
    </div>

     <div class="col-md-3 ">
                                
                                    <div class="card red">
                                        <div class="card-body white-text">
                                            <div class="pull-right">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <p  >Top 10 Rankers</p>
                                           
                                            <h4 class="text-center">30</h4>

                                        </div>
                                        
                                        <div class=" white-text" style="font-family: 'Barlow Semi Condensed', sans-serif;">
                                            <div class="text-center" style="padding: .5rem">
                                                    <a href="" class="white-text" >Go to Page &nbsp; <i class="fa fa-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                               
    </div>
    <div class="col-md-3 ">
                                
                                    <div class="card black">
                                        <div class="card-body white-text">
                                            <div class="pull-right">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <p  >Last 10 Rankers</p>
                                           
                                            <h4 class="text-center">20</h4>

                                        </div>
                                        
                                        <div class=" white-text" style="font-family: 'Barlow Semi Condensed', sans-serif;">
                                            <div class="text-center" style="padding: .5rem">
                                                    <a href="" class="white-text" >Go to Page &nbsp; <i class="fa fa-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                               
    </div>
     <div class="col-md-3 ">
                                
                                    <div class="card success-color">
                                        <div class="card-body white-text">
                                            <div class="pull-right">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <p  >Practice Papers</p>
                                           
                                            <h4 class="text-center"><?php echo e(@App\Test::count()); ?></h4>

                                        </div>
                                        
                                        <div class=" white-text" style="font-family: 'Barlow Semi Condensed', sans-serif;">
                                            <div class="text-center" style="padding: .5rem">
                                                    <a href="" class="white-text" >Go to Page &nbsp; <i class="fa fa-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                               
    </div>
</div>
<div class="row p-0 m-0 mt-2">
	<div class="col-md-7 ">
		<div class="card p-2">
			<canvas id="lineChart"></canvas>
		</div>
    
    </div>
	<div class="col-md-5">
		
			<a class="btn btn-block btn-md indigo white-text" href="">Generate Yearly  Report</a>
         <a class="btn btn-block btn-md red white-text mt-2" href="">Generate  Monthly Report</a>
          <a class="btn btn-block btn-md black white-text mt-2" href="">Generate Report</a>
           <a class="btn btn-block btn-md btn-success white-text mt-2" href="">Generate Report</a>
	
	</div>

</div>
<script type="text/javascript" src="<?php echo e(url('js/jquery-3.3.1.min.js')); ?>"></script>
 <script type="text/javascript">
     $(document).ready(function(){

//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["Today", "This weak", "This month", "This year"],
        datasets: [
            {
                label: "Stock in",
                fillColor: "rgba(76, 175, 80, 0.7)",
                strokeColor: "rgba(76, 175, 80, 1)",
                pointColor: "rgba(76, 175, 80, 0.7)",
                pointStrokeColor: "rgba(76, 175, 80, 0.7)",
                pointHighlightFill: "rgba(76, 175, 80, 0.7)",
                pointHighlightStroke: "rgba(76, 175, 80, 0.7)",
                data: [10,20,10,30 ,40 ]
            },
            
        ]
    },
    options: {
        responsive: true
    }    
});
            
     });
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>