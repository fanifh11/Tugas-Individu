using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Kalkulator_Baru
{
    public partial class Kalkulator : Form
    {
        float number, ans;
        int count;


        public Kalkulator()
        {
            InitializeComponent();
        }

        private void num1_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 1;
        }

        private void num2_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 2;   
        }

        private void num3_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 3;

        }

        private void num4_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 4;
        }

        private void num5_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 5;
        }

        private void num6_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 6;
        }

        private void num7_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 7; 

        }

        private void num8_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 8;
        }

        private void num9_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 9;
        }

        private void num0_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + 0;
        }

        private void btnComa_click(object sender, EventArgs e)
        {
            Display.Text = Display.Text + ",";
        }

        public void Hitung()
        {
            switch (count)
            {
                case 1:
                    ans = number + float.Parse(Display.Text);
                    Display.Text = ans.ToString();
                    break;
                case 2:
                    ans = number - float.Parse(Display.Text);
                    Display.Text = ans.ToString();
                    break;
                case 3:
                    ans = number * float.Parse(Display.Text);
                    Display.Text = ans.ToString();
                    break;
                case 4:
                    ans = number / float.Parse(Display.Text);
                    Display.Text = ans.ToString();
                    break;
            }
        }

        private void btnHasil_click(object sender, EventArgs e)
        {
            Hitung();
            label1.Text = "";
        }

        private void btnJumlah_click(object sender, EventArgs e)
        {
            number = float.Parse(Display.Text);
            Display.Clear();
            Display.Focus();
            count = 1;
            label1.Text = number.ToString()+"+";
        }

        private void btnKurang_click(object sender, EventArgs e)
        {
            number = float.Parse(Display.Text);
            Display.Clear();
            Display.Focus();
            count = 2;
            label1.Text = number.ToString() +"-";
        }

        private void btnKali_click(object sender, EventArgs e)
        {
            number = float.Parse(Display.Text);
            Display.Clear();
            Display.Focus();
            count = 3;
            label1.Text = number.ToString() + "*";
        }

        private void btnBagi_click(object sender, EventArgs e)
        {
            number = float.Parse(Display.Text);
            Display.Clear();
            Display.Focus();
            count = 4;
            label1.Text = number.ToString() + "/";

        }


        private void btnClear_click(object sender, EventArgs e)
        {
            Display.Text = "";
        }

        private void Display_TextChanged(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            

        }

        

        private void plusmin_click(object sender, EventArgs e)
        {
            if (Display.Text.Contains("-"))
            {
                Display.Text = Display.Text.Remove(0, 1);
            }
            else
            {
                Display.Text = "-" + Display.Text;
            }

        }

        private void btnBackspace_click(object sender, EventArgs e)
        {
            int length = Display.TextLength - 1;
            string text = Display.Text;
            Display.Clear();
            for (int i=0; i < length; i++)
            {
                Display.Text = Display.Text + text[i];
            }
        }
    }
}
