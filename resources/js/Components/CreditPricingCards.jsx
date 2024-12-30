import {usePage} from "@inertiajs/react";

export default function CreditPricingCards({packages, features}){

    const {csrf_token} = usePage().props;

    return (
        <section className="bg-gray-900">
            <div className="py-8 px-4">

                <div className="text-center mb-8">
                    <h2 className="mb-4 text-4xl front-extrabold text-white">
                        The more credits you choose, the bigger savings you get
                    </h2>
                </div>

                <div className="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                    {
                        packages.map((p) => (
                            <div
                                key={p.id}
                                className="flex flex-col align-stretch p-6 mx-auto lg:mx-0 max-w-lg text-center rounded-lg border shadow border-gray-600 bg-gray-800 text-white"
                            >
                                <h3 className="mb-4 text-2xl font-semibold">
                                    {p.name}
                                </h3>
                                <div className="flex justify-center items-baseline my-8">
                                    <span className="mr-2 text-5xl font-extrabold">
                                        ${p.price}
                                    </span>
                                    <span className="text-2xl dark:text-gray-400">
                                        / {p.credits} credits
                                    </span>
                                </div>

                                <ul
                                    role="list"
                                    className="mb-8 space-y-4 text-left"
                                >
                                    {
                                        features.map((f) => (
                                            <li
                                                key={f.id}
                                                className="flex items-center space-x-2"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    className="w-6 h-6"
                                                >
                                                    <path
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                        d="M5 13l4 4L19 7"
                                                    />
                                                </svg>
                                                <span>{f.name}</span>
                                            </li>
                                        ))
                                    }
                                </ul>

                                <form
                                    method="POST"
                                    action={route('credit.buy', p)}
                                    className="w-full"
                                >
                                    <input
                                        type="hidden"
                                        name="_token"
                                        value={csrf_token}
                                        autoComplete="off"
                                    />
                                    <input type="hidden" name="package_id" value={p.id}/>
                                    <button
                                        type="submit"
                                        className="bg-blue-600 hover:bg-blue-700 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2,5 text-center text-white focus:ring-blue-900 w-full"
                                    >
                                        Get Started
                                    </button>
                                </form>

                            </div>
                        ))
                    }
                </div>

            </div>
        </section>
    )

}
