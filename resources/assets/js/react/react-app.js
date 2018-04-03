import React from 'react';
import QuestionList from './question-list';

class App extends React.Component
{
    render() {
        var id = $('[name="items"]').data('id');
        return (
            <div>
                <QuestionList url={'/dashboard/topics/'+id+'/data'}/>
            </div>
        );
    }
}

export default App;