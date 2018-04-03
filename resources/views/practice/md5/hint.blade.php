<p>
    Введене повідомлення: {{$data = $topic->getTyped('data')}}<br/>
    A: {{$a}}<br/>
    B: {{$b}}<br/>
    C: {{$c}}<br/>
    D: {{$d}}<br/>
    X[{{$index}}]: {{$msg}}<br/>
</p>
<p>
    <code>
        F = {{$f_calc}}<br/>
        A<sub>pop</sub> = A + F + X[{{$index}}] + {{$K}}<br/>
        A<sub>cycl</sub> = A<sub>pop</sub> <<< {{$s}}<br/>
        A<sub>out</sub> = A<sub>cycl</sub> + B<br/>
    </code>
</p>