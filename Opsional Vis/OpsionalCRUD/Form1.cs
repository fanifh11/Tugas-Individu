using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Runtime.InteropServices;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace OpsionalCRUD
{
    public partial class Form1 : MetroFramework.Forms.MetroForm
    {
        public Form1()
        {
            InitializeComponent();
        }



        private void Form1_Load(object sender, EventArgs e)
        { 
            // TODO: This line of code loads data into the 'appData1.member' table. You can move, or remove it, as needed.
            this.memberTableAdapter.Fill(this.appData.member);
            // TODO: This line of code loads data into the 'appData.member' table. You can move, or remove it, as needed.
            this.memberTableAdapter.Fill(this.appData.member);
            memberBindingSource.DataSource = this.appData.member;

        }

     

        private void dataGridView_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode==Keys.Delete)
            {
                if (MessageBox.Show("Yakin untuk menghapus member ?", "Message", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
                    memberBindingSource.RemoveCurrent();
            }

        }

        private void buttonAdd_Click(object sender, EventArgs e)
        {
            try
            {
                panel1.Enabled = true;
                textBox1.Focus();
                this.appData.member.AddmemberRow(this.appData.member.NewmemberRow() );
                memberBindingSource.MoveLast();

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
                memberBindingSource.ResetBindings(false);
            }

        }

        private void buttonEdit_Click(object sender, EventArgs e)
        {
            panel1.Enabled = true;
            textBox1.Focus();
        }

        private void buttonCncl_Click(object sender, EventArgs e)
        {
            panel1.Enabled = false;
            memberBindingSource.ResetBindings(false);
        }

        private void butonSave_Click(object sender, EventArgs e)
        {
            try
            {
                memberBindingSource.EndEdit();
                memberTableAdapter.Update(this.appData.member);
                panel1.Enabled = false;

            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.Message,"Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
                memberBindingSource.ResetBindings(false);

            }

        }

        private void buttonCari_Click(object sender, EventArgs e)
        {
            try
            {
                using (OpenFileDialog ofd  = new OpenFileDialog() {Filter= "JPEG|*.jpg",ValidateNames=true, Multiselect  = false  }) 
                {
                    if (ofd.ShowDialog() == DialogResult.OK)
                        pictureBox1.Image = Image.FromFile(ofd.FileName);
                }
            }

            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void txtSearch_KeyPress(object sender, KeyPressEventArgs e)
        {
            if(e.KeyChar == (char)13) 
            {
                if (string.IsNullOrEmpty(txtSearch.Text))
                    dataGridView.DataSource = memberBindingSource;
                else
                {
                    var query = from o in this.appData.member
                                where o.namapanjang.Contains(txtSearch.Text) || o.namapanggilan.Contains(txtSearch.Text)
                                select o;
                    dataGridView.DataSource = query.ToList();
                }
            
            
             }

            
        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
           
        }

  

     
    }
}
