@extends('base')
@section('content')
<div class="col-md-12">
	<div class="order-summary clearfix">
		<div class="section-title">
			<h3 class="title">Mes Notifications</h3>
		</div>
		<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Notification</th>
										
										<th class="text-center">Type d'objet</th>
										<th class="text-center">Titre</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach(auth()->user()->notifications->where('type', 'App\Notifications\ReponseSurAnnonce') as $notification)
									<tr>
									<td class="thumb"><img src="annonce_affichage/fetch_image/{{ $notification->data['identifiant'] }}" alt="" ></td>
                                        <td class="price text-center"><strong>{{$notification->data['typeObjet']}}</strong><br><!--<del class="font-weak"><small>sous type</small></del>--></td>
                                        <td class="total text-center"><strong class="primary-color">{{$notification->data['title'] }}</strong></td>
										
										
										<td class="text-center">
                                            <a href="/annonce/{{$notification->data['identifiant'] }}">
                                                <button type="button" class="btn btn-primary">plus de détails</button>
                                            </a>
											<a href="/notifications/MarkAsRead{{$notification->id}}">
                                                <button type="button" class="btn btn-success"><i class="fa fa-eye"></i> Marquer lu</button>
                                            </a>
											<a href="/notifications/MarkAsUnread{{$notification->id}}">
                                                <button type="button" class="btn btn-warning"><i class="fa fa-eye-slash"></i> Marquer non lu</button>
                                            </a>
											<a href="/notifications/destroy{{$notification->id}}">
												<button type="button" class="btn btn-danger">Supprimer</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
								</tbody>
		</table>
							
	</div>

</div>
@endsection