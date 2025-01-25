<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Position Sheet</title>
    <style>
        /* General body styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #586bc0, #fad0c4);
            color: #333;
        }

        /* Center alignment and spacing for heading */
        h1 {
            text-align: center;
            margin-top: 30px;
            color: #0c0101;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Webhook URL input styling */
        #webhook-url {
            width: 60%;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        #webhook-url:focus {
            border-color: #ff7b7b;
        }

        div {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Table styles */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
        }

        th {
            background: #3e5ec9;
            color: #fff;
            padding: 12px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        input[type="text"], input[type="date"] {
            width: 90%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="date"]:focus {
            border-color: #ff7b7b;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #ffe0e0;
            transition: background 0.3s ease;
        }

        /* Button styling */
        button {
            background: #5c42bb;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        button:active {
            transform: scale(0.95);
        }

        /* Back button positioning */
        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            #webhook-url {
                width: 90%;
                font-size: 14px;
            }

            table {
                width: 100%;
                margin: 10px auto;
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }

            input[type="text"], input[type="date"] {
                font-size: 12px;
                padding: 6px;
            }

            button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        @media screen and (max-width: 480px) {
            h1 {
                font-size: 20px;
                margin-top: 20px;
            }

            #webhook-url {
                width: 95%;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 6px;
            }

            button {
                padding: 8px 16px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Position Sheet</h1>

    <!-- Webhook Input -->
    <div>
        <input type="url" id="webhook-url" placeholder="Enter your Discord Webhook URL">
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>วิชา</th>
                <th>ลายละเอียด</th>
                <th>เวลา</th>
                <th>กี่งาน</th>
            </tr>
        </thead>
        <tbody id="data-table">
            <!-- Generate 20 rows -->
            <script>
                for (let i = 0; i < 20; i++) {
                    document.write(`
                        <tr>
                            <td><input type="text" placeholder="ใส่วิชา"></td>
                            <td><input type="text" placeholder="ใส่ลายละเอียด"></td>
                            <td><input type="date"></td>
                            <td><input type="text" placeholder="ใส่จำนวน"></td>
                        </tr>
                    `);
                }
            </script>
        </tbody>
    </table>

    <!-- Submit Button -->
    <button onclick="submitData()">Submit</button>

    <!-- Back Button -->
    <button class="back-button" onclick="goBack()">Back</button>

    <script>
        function goBack() {
            window.history.back(); // Navigate to the previous page
        }

        async function submitData() {
            const webhookURL = document.getElementById('webhook-url').value;
            if (!webhookURL) {
                alert('Please enter a valid Discord webhook URL!');
                return;
            }

            const tableBody = document.getElementById('data-table');
            const rows = tableBody.getElementsByTagName('tr');

            let data = [];
            for (let row of rows) {
                const inputs = row.getElementsByTagName('input');
                const rowData = {
                    subject: inputs[0].value,
                    details: inputs[1].value,
                    dueDate: inputs[2].value,
                    taskCount: inputs[3].value
                };
                if (rowData.subject || rowData.details || rowData.dueDate || rowData.taskCount) {
                    data.push(rowData);
                }
            }

            if (data.length === 0) {
                alert('No data to submit!');
                return;
            }

            console.log('Submitted Data:', data);

            const messageContent = data.map((item, index) => 
                `**Task ${index + 1}**\n` +
                `- วิชา: ${item.subject || "N/A"}\n` +
                `- ลายละเอียด: ${item.details || "N/A"}\n` +
                `- เวลา: ${item.dueDate || "N/A"}\n` +
                `- กี่งาน: ${item.taskCount || "N/A"}\n`
            ).join("\n\n");
        

            try {
                const response = await fetch(webhookURL, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        content: `**Submitted Tasks:**\n\n${messageContent}`
                    })
                });

                if (response.ok) {
                    alert('Data submitted successfully and sent to Discord!');
                } else {
                    alert('Failed to send data to Discord. Please check the webhook URL.');
                }
            } catch (error) {
                console.error('Error sending data to Discord:', error);
                alert('Error sending data to Discord.');
            }
        }
    </script>
</body>
</html>