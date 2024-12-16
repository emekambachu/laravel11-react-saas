import InputError from '@/Components/InputError';
import InputLabel from "@/Components/InputLabel.jsx";
import TextInput from "@/Components/TextInput.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";
import { useForm } from '@inertiajs/react';
import Feature from "@/Components/Feature.jsx";

export default function index({feature, answer}){
    const {data, setData, post, reset, errors, processing} = useForm({
        number1: '',
        number2: ''
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('feature1.calculate'), {
            onSuccess: () => {
                reset();
            },
        });
    };

    return (
        <Feature feature={feature} answer={answer}>
            <form onSubmit={submit} className="p-8 grid grid-cols-2 gap-3">
                <div>
                    <InputLabel htmlFor="number1" value="Number 1"/>
                    <TextInput
                        id="number1"
                        type="text"
                        value={data.number1}
                        className="mt-1 block w-full"
                    />
                </div>
            </form>
        </Feature>
    );

}
