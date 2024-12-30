import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth, usedFeature }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <div className="relative overflow-x-auto">
                            <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead>
                                    <tr>
                                        <th
                                            scope="col"
                                            className="px-6 py-3"
                                        >Feature
                                        </th>
                                        <th
                                            className="px-6 py-3"
                                            scope="col"
                                        >Used
                                        </th>
                                        <th
                                            className="px-6 py-3"
                                            scope="col"
                                        >Date
                                        </th>
                                        <th
                                            className="px-6 py-3"
                                            scope="col"
                                        >Additional Data
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {usedFeature?.data?.map((feature) => (
                                        <tr
                                            key={feature.id}
                                            className="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                        >
                                            <th
                                                className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                                scope="row"
                                            >
                                                {feature.feature.name}
                                            </th>
                                            <td className="px-6 py-4">
                                           \     {feature.credits}
                                            </td>
                                            <td className="px-6 py-4">
                                                {feature.created_at}
                                            </td>
                                            <td className="px-6 py-4">
                                                {JSON.stringify(feature.data)}
                                            </td>
                                        </tr>
                                    ))}

                                    {
                                        !usedFeature.data.length && (
                                            <tr>
                                                <td
                                                    colSpan="4"
                                                    className="text-center p-8"
                                                >
                                                    You have not used any features yet
                                                </td>
                                            </tr>
                                        )
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
