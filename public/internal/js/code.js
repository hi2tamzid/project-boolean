// function addTeamMembers(num){
//   return `<div class="row">
//   <div class="col-md-6">
//     <div class="mb-3">
//       <label for="member${num}" class="form-label">Member ${num}</label><br>
//       <select name="member${num}" class="form-select" aria-label="member${num}">
//         @foreach($student as $s)
//         <option value="{{ $s->id }}" {{ old('member${num}') == "{{ $s->id }}" ? "selected" : "" }}>{{ $s->student_id }} - {{ $s->name }}</option>
//         @endforeach
//       </select>
//     </div>
//     @if($errors->has('member${num}'))
//     <span class="err">{{ $errors->first('member${num}') }}</span>
//     @endif
//   </div>
// </div>`;
// }

// let admin_team_members = document.querySelector('.admin_team_members');
// let team_member_pickup = document.querySelector('.manipulation_team_register');
// admin_team_members.addEventListener('input', () => {
//   let team_mate_numbers = admin_team_members.value;
//   let ans = "";
//   for(i = 1 ; i <= team_mate_numbers ; i++){
//     ans += addTeamMembers(i);
//   }
//   team_member_pickup.innerHTML = ans;
//   // temp = 

// });